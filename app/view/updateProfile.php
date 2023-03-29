<div tabindex="0" aria-label="form" class="focus:outline-none w-full bg-white p-10">
  <div class="md:flex items-center border-b pb-6 border-gray-200">
    <div class="flex items-center md:mt-0 mt-4">
      <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center">
        <a href="update-password">
          <p tabindex="0" class="focus:outline-none text-base font-medium leading-none text-gray-800">01</p>
        </a>
      </div>
      <p tabindex="0" class="focus:outline-none text-base ml-3 font-medium leading-4 text-gray-800">Update Password</p>

    </div>
    <div class="flex items-center md:mt-0 mt-4 md:ml-12">
      <div class="w-8 h-8 bg-indigo-700 rounded flex items-center justify-center">
        <a href="update-profile">
          <p tabindex="0" class="focus:outline-none text-base font-medium leading-none text-white">02</p>
        </a>
      </div>
      <p tabindex="0" class="focus:outline-none text-base ml-3 font-medium leading-4 text-gray-800">Update Profile</p>
    </div>
  </div>
  <h1 tabindex="0" role="heading" aria-label="profile information" class="focus:outline-none text-3xl font-bold text-gray-800 mt-12">Profile</h1>
  <h2 tabindex="0" class="focus:outline-none text-xl font-semibold leading-7 text-gray-800 mt-8">Update personal data</h2>
  <p tabindex="0" class="focus:outline-none text-sm font-light leading-none text-gray-600 mt-0.5">Your details</p>
  <br>
  <?php if (isset($model['error'])) { ?>
    <div class="mb-4 rounded-lg bg-danger-100 py-5 px-6 text-base text-danger-700" role="alert" id="notification">
      <button aria-label="close" class="absolute right-0 mr-4 text-gray-500 dark:text-gray-100 dark:hover:text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out cursor-pointer focus:ring-2 focus:outline-none focus:ring-gray-500 rounded" onclick="closeModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" />
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
      <?= $model['error'] ?>
    </div>
  <?php } else { ?>

    <div class="mb-4 rounded-lg bg-success-100 py-5 px-6 text-base text-success-700" role="alert" id="notification">
      <button aria-label="close" class="absolute right-0 mr-4 text-gray-500 dark:text-gray-100 dark:hover:text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out cursor-pointer focus:ring-2 focus:outline-none focus:ring-gray-500 rounded" onclick="closeModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" />
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
      <?php echo "Update Profile Success" ?>
    </div>
  <?php } ?>
  <form action="/update-profile" method="post">
    <div class="mt-8 md:flex items-center">
      <div class="flex flex-col">
        <label class="mb-3 text-sm leading-none text-gray-800">ID</label>
        <input type="text" tabindex="0" aria-label="Enter first name" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" name="id" value="<?= $model['User']['id'] ?? '' ?>" disabled />
      </div>

    </div>
    <div class="mt-12 md:flex items-center">
      <div class="flex flex-col">
        <label class="mb-3 text-sm leading-none text-gray-800">Name</label>
        <input type="text" tabindex="0" aria-label="Enter date of birth" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" name="nama" value="<?= $model['User']['name'] ?? '' ?>" />
      </div>
      <div class="flex flex-col md:ml-12 md:mt-0 mt-8">
        <label class="mb-3 text-sm leading-none text-gray-800">Username</label>
        <input type="text" tabindex="0" aria-label="Enter last name" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" name="username" value="<?= $model['User']['username'] ?? '' ?>" />
      </div>
    </div>

    <div class="mt-12 md:flex items-center">
      <div class="flex flex-col">
        <label class="mb-3 text-sm leading-none text-gray-800">Email Address</label>
        <input type="email" tabindex="0" aria-label="Enter email Address" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" name="email" value="<?= $model['User']['email'] ?? '' ?>" />
      </div>
      <div class="flex flex-col md:ml-12 md:mt-0 mt-8">
        <label class="mb-3 text-sm leading-none text-gray-800">Phone number</label>
        <input type="text" tabindex="0" aria-label="Enter phone number" class="focus:outline-none focus:ring-2 focus:ring-indigo-400 w-64 bg-gray-100 text-sm font-medium leading-none text-gray-800 p-3 border rounded border-gray-200" name="telepon" value="<?= $model['User']['telepon'] ?? '' ?>" />
      </div>
    </div>

    <button role="button" type="submit" aria-label="Next step" class="flex items-center justify-center py-3 px-7 focus:outline-none bg-white border rounded border-gray-400 mt-7 md:mt-10 hover:bg-gray-100  focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
      <span class="text-sm font-medium text-center text-gray-800 capitalize">Update Done</span>
    </button>
  </form>

</div>
<style>
  .checkbox:checked+.check-icon {
    display: flex;
  }
</style>
<script>
  // Ambil elemen button dengan id "notification"
  function closeModal() {
    document.getElementById("notification").style.display = "none";
    // Simpan status notifikasi pada session storage
    sessionStorage.setItem('notification', 'closed');
  }

  // Cek apakah notifikasi sudah ditutup sebelumnya
  if (sessionStorage.getItem('notification') === 'closed') {
    document.getElementById("notification").style.display = "none";
  }
  // Hapus status notifikasi dari session storage ketika ada pembaruan
  sessionStorage.removeItem('notification');
</script>