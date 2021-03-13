<div
class="bg-grayDark"
x-data="{ atTop: true }"
x-on:scroll.window="atTop =( window.pageYOffset > 10) ? false : true "
>
<!-- Navbar -->
<div
class="w-full text-gray-700 bg-gray-200 h-16 fixed top-0 animated z-40"
x-bind:class='{ "bg-black shadow-lg": !atTop }'
>
<div
  x-data="{ open: false }"
  class="flex flex-col max-w-screen-xl px-2 mx-auto md:items-center md:justify-between md:flex-row"
>
  <div class="p-4 flex flex-row items-center justify-between">
    <a
      href="/"
      class="tracking-widest rounded-lg focus:outline-none focus:shadow-outline text-lg"
    >
    Developer test - {{ \Carbon\Carbon::now()->toDateString() }} 
    </a>
    <!-- Button Mobile Nav -->
    <button
      class="md:hidden rounded-lg focus:outline-none focus:shadow-outline"
      @click="open = !open"
    >
     
    </button>
    <!-- End Button Mobile Nav -->
  </div>
  <!-- Navbar Mobile -->
  <nav
    :class="{'flex': open, 'hidden': !open}"
    class="flex-col flex-grow pb-4 hidden bg-white shadow-lg rounded-b"
  >

  </nav>
  <!-- End Navbar Mobile -->
  <nav
    class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row bg-gray-200"
  >

    <div
      @click.away="open = false"
      class="relative"
      x-data="{ open: false }"
    >

    </div>
    <div
      @click.away="open = false"
      class="relative"
      x-data="{ open: false }"
    >
      <button
        @click="open = !open"
        class="flex flex-row items-center w-full px-1 py-1 mt-2 text-base font-semibold text-left bg-transparent rounded-full md:w-auto md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
      >
        <img src="{{asset('images/abra.jpg')}}" class="w-auto h-8 rounded-full mr-4" alt="" /> Abraham Maleko
      </button>

    </div>
  </nav>
</div>
</div>
</div>