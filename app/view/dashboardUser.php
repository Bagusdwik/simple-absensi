<nav class="flex-no-wrap relative flex w-full items-center justify-between bg-neutral-100 py-4 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start" data-te-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-6">
    <button class="block border-0 bg-transparent py-2 px-2.5 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden" type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="[&>svg]:w-7">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
          <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto" id="navbarSupportedContent1" data-te-collapse-item>
      <!-- Left links -->
      <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
        <li class="lg:pr-2" data-te-nav-item-ref>
          <a class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400" href="#" data-te-nav-link-ref>Dashboard</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="relative flex items-center">
      <!-- Icon -->
      <div class="relative" data-te-dropdown-ref>
        <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none" href="#" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
          <img src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg" class="rounded-full" style="height: 25px; width: 25px" alt="" loading="lazy" />
        </a>
        <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
          <li>
            <a class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="#" data-te-dropdown-item-ref>Setting</a>
          </li>
          <li>
            <a class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="logout" data-te-dropdown-item-ref>Log out</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
</nav>
<br>
<div class="flex justify-center">
  <div class="block max-w-sm rounded-lg bg-white text-center shadow-lg dark:bg-neutral-700">
    <div class="p-6">
      <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
        Absensi
      </h5>
      <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
        Absensi akan terhitung setiap anda mengklik tombol Hadir
      </p>
      <form action="/absen" method="post">
        <button type="button" data-te-ripple-init data-te-ripple-color="light" class="inline-block rounded bg-success px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
          Hadir
        </button>
      </form>
    </div>
  </div>
</div>
<br>
<div class="flex justify-center">
  <div class="block max-w-sm text-center rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
      Pakta Integritas
    </h5>
    <p class="mb-4 leading-tight text-base text-neutral-600 dark:text-neutral-200">
      Pakta Integritas adalah pernyataan atau janji kepada diri sendiri tentang komitmen melaksanakan seluruh tugas, fungsi, tanggung jawab, wewenang dan peran sesuai dengan peraturan perundang-undangan dan kesanggupan untuk tidak melakukan korupsi, kolusi, dan nepotisme.
    </p>
    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
      Pakta Integritas bisa anda submit kapanpun.
    </p>
    <form action="/upload" method="post" enctype="multipart/form-data">
      <div class="flex justify-center">
        <div class="mb-3 w-96">
          <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 dark:border-neutral-600 bg-clip-padding py-[0.32rem] px-3 text-base font-normal text-neutral-700 dark:text-neutral-200 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 dark:file:bg-neutral-700 file:px-3 file:py-[0.32rem] file:text-neutral-700 dark:file:text-neutral-100 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none" type="file" id="pakta" name="pakta" />
        </div>
      </div>
      <button type="file" class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
        Submit
      </button>
    </form>
  </div>
</div>