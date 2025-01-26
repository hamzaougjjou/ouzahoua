
<div class="flex justify-center items-center" dir="ltr">
    @if (!request('q'))
        <div class="mt-[50px] mx-auto">
            {{ $products->links('pagination::tailwind') }}
        </div>
    @endif
</div>