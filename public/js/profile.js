const btn_show_update_profile_container = document.getElementById("btn-show-update-profile-container");
const btn_close_update_profile_container = document.getElementById("btn-close-update-profile-container");
const update_profile_container = document.getElementById("update-profile-container");

btn_show_update_profile_container.addEventListener('click', () => {
    update_profile_container.classList.remove('hidden', 'opacity-0', 'scale-90');
    update_profile_container.classList.add('flex', 'opacity-100', 'scale-100');
});

btn_close_update_profile_container.addEventListener('click', () => {
    update_profile_container.classList.remove('opacity-100', 'scale-100');
    update_profile_container.classList.add('opacity-0', 'scale-90');

    setTimeout(() => {
        update_profile_container.classList.remove('flex');
        update_profile_container.classList.add('hidden');
    }, 300); // نفس مدة الحركة
});
