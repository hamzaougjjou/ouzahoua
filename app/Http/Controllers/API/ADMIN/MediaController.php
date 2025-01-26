<?php
namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the media files and folders.
     */
    public function folders()
    {
        // Fetch all media (files and folders)
        $folders = Media::where('file_type', '=', 'folder')->get(); // Only folders
        return response()->json([
            "success" => true,
            "message" => 'folders retrieved successfully',
            "folders" => $folders
        ], 200);
    }
    public function files()
    {
        // Fetch all media (files and folders)
        $files = Media::where('file_type', '!=', 'folder')->get(); // Only files
        return response()->json([
            "success" => true,
            "message" => 'files retrieved successfully',
            "files" => $files
        ], 200);
    }

    /**
     * Store a newly created media (file or folder).
     */
    public function store(Request $request)
    {
        // return "hello";
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'file' => 'nullable|file', // Max 10MB
            'folder' => 'nullable|string', // Folder where the file will be saved
            'user_id' => 'nullable|exists: ,id', // Seller ID
        ]);

        if ($request->hasFile('file')) {
            // Handle the file upload
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Determine the folder where the file should be stored
            $folder = $request->input('folder'); // Default folder if none provided

            // Store the file in the specified folder
            if (!$folder || $folder == null)
                $filePath = $file->storeAs("/uploads", $fileName, 'public');
            else
                $filePath = $file->storeAs("/uploads" . "/" . $folder, $fileName, 'public');
            // Save the file information in the database
            $media = Media::create([
                'name' => $request->name ? $request->name : $fileName,
                'file_type' => $file->getClientMimeType(),
                'file_path' => $filePath,
                'folder' => null,
                'user_id' => null, // Could be null for admin
            ]);

            return response()->json(['success' => true, 'media' => $media], 201);
        } else {
            // Creating a folder
            $media = Media::create([
                'name' => $request->input('name'),
                'folder' => $request->input('folder', 'uploads'), // Optional folder
                'user_id' => null, // Could be null for admin
            ]);

            return response()->json(['success' => true, 'folder' => $media], 201);
        }
    }

    /**
     * Display the specified media file or folder.
     */
    public function show($id)
    {
        $media = Media::find($id);

        if (!$media) {
            return response()->json(['error' => 'Media not found'], 404);
        }

        return response()->json(['media' => $media], 200);
    }

    /**
     * Update the specified media.
     */
    public function update(Request $request, $id)
    {
        $media = Media::find($id);

        if (!$media) {
            return response()->json(['error' => 'Media not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
        ]);

        $media->update([
            'name' => $request->input('name'),
        ]);

        return response()->json(['success' => true, 'media' => $media], 200);
    }

    /**
     * Remove the specified media from storage.
     */
    public function destroy($id)
    {
        $media = Media::find($id);

        if (!$media) {
            return response()->json(['error' => 'Media not found'], 404);
        }

        // If it's a file, delete from the storage as well
        if ($media->file_path) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $media->file_path));
        }

        // Delete the media record from the database
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted'], 200);
    }
}
