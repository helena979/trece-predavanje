@extends('layouts.layout')
@section('content')
 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] pb-[21px]">
                        <h1>
                            Settings
                        </h1>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
            <a href="{{route('settings')}}" class="inline hover:text-blue-800 active-book-nav">
                    Polisa
                </a>
                <a href="{{route('kategorija.index')}}" class="inline ml-[70px] hover:text-blue-800">
                    Kategorije
                </a>
                <a href="{{route('zanr.index')}}" class="inline ml-[70px] hover:text-blue-800">
                    Zanrovi
                </a>
                <a href="{{route('izdavac.index')}}" class="inline ml-[70px] hover:text-blue-800">
                    Izdavac
                </a>
                <a href="{{route('povez.index')}}" class="inline ml-[70px] hover:text-blue-800">
                    Povez
                </a>
                <a href="{{route('format.index')}}" class="inline ml-[70px] hover:text-blue-800">
                    Format
                </a>
                <a href="{{route('pismo.index')}}" class="inline ml-[70px] hover:text-blue-800">
                    Pismo
                </a>
            </div>
            <div class="height-kategorije pb-[30px] scroll">
            @if(@session('success'))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>Zanr je uspjecno dodat</p>
</div>
                @endif
                @if(@session('fail'))
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>Postoji greska u dodavanju zanra</p>
</div>
@endif
                <div
                    class="inline-block min-w-full px-[50px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="min-w-full shadow-lg" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv zanra<a href="#"><i
                                            class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                                </th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($zanrovi as $zanr)
                            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <p>Poezija</p>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsGenre hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-genre">
                                        <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                            aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                            <div class="py-1">
                                                <a href="editZanr.php" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni zanr</span>
                                                </a>
                                                <a href="#" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izbrisi zanr</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>

                    <div class="flex flex-row items-center justify-end mt-2">
                        <div>
                            <p class="inline text-md">
                                Rows per page:
                            </p>
                            <select
                                class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                                name="ucenici">
                                <option value="">
                                    20
                                </option>
                                <option value="">
                                    Option1
                                </option>
                                <option value="">
                                    Option2
                                </option>
                                <option value="">
                                    Option3
                                </option>
                                <option value="">
                                    Option4
                                </option>
                            </select>
                        </div>

                        <div>
                            <nav class="relative z-0 inline-flex">
                                <div>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out text-md focus:z-10 focus:outline-none">
                                        1 of 1
                                    </a>
                                </div>
                                <div>
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                        aria-label="Previous"
                                        v-on:click.prevent="changePage(pagination.current_page - 1)">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                                <div v-if="pagination.current_page < pagination.last_page">
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                        aria-label="Next">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!-- End Content -->
        @endsection