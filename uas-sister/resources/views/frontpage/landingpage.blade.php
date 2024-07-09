<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('assets/plugin/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<x-home-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex items-baseline justify-between border-b border-gray-200 pt-2 pb-6">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>
                                <div class="flex items-center">
                                    
                                </div>
                        </div>

                        <section>
                            @foreach ($packages as $key=>$item)
                            <div class="md:flex font-sans pt-8">
                                <div class="md:shrink-0 ">
                                <img src= "{{$item->feature_img}}" alt="" class="h-48 w-full md:h-full md:w-56 inset-0 object-cover rounded-lg" loading="lazy" />
                                </div>
                                <form class="p-6">
                                    <div class="flex flex-wrap">
                                        <h1 class="flex-auto font-medium text-slate-900">
                                            {{$item->package_name}}
                                        </h1>
                                        <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                                        @foreach ($item->rates as $rate)
                                                {{$rate->rate_name}}
                                            @endforeach
                                        </div>
                                        <div class="text-sm font-medium text-slate-400">
                                            Available
                                        </div>
                                    </div>
                                    <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
                                    {{$item->package_desc}}
                                    </div>
                                    <div class="flex space-x-4 mb-5 text-sm font-medium">
                                        <div class="flex-auto flex space-x-4">
                                            <a href="" class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white flex items-center justify-center" type="submit">
                                                Beli Sekarang
                                            </a>
                                            <a href="/pesanan" data-bs-toggle="modal" data-bs-target="#exampleModalLg" class="h-10 px-6 font-semibold rounded-full border border-slate-200 text-slate-900 flex items-center justify-center" type="button">
                                                Detail Produk
                                            </a>
                                        
                                           
                                        </div>
                                        <button class="flex-none flex items-center justify-center w-9 h-9 rounded-full text-violet-600 bg-violet-50" type="button" aria-label="Like">
                                            <svg width="20" height="20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p>
                                    Comunity: {{$item->comunity->comunity_name}}
                                    </p>
                                </form>
                            </div>
                     
                            @endforeach
                            <div class=" font-sans pt-8 text-center">
                                <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium bg-violet-600 text-white rounded-lg ">
                                    Previous
                                </a>
                                <!-- Next Button -->
                                <a href="#" class="inline-flex items-center py-2 px-4 ml-3 text-sm font-medium  bg-violet-600 text-white rounded-lg">
                                    Next
                                </a>
                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
        {{-- modal form untuk cek availibility --}}
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                </div>
            </div>
        </div>
    </div>



</x-home-layout>

</body>
</html>