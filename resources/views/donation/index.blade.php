<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-xl font-semibold flex justify-center items-center">Support Me</div>

                	<div class="mb-6 ">

                    <form method="POST" action="{{ route('transaction.store') }}">
                    @csrf
                		<div class="text-xl mb-5">Pilih Nominal :</div>
                		
                		<ul class="grid mb-16 gap-6 w-full grid-cols-3">
                			@foreach($nominals as $nominal )
                			<li>
						        <input type="radio" id="{{ $nominal->harga }}" name="amount" value="{{ $nominal->harga }}" class="hidden peer" required>
						        <label for="{{ $nominal->harga }}" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">                           
						            <div class="block">
						                <div class="w-full text-lg font-semibold">Rp. {{ number_format($nominal->harga) }}</div>
						            </div>
						        </label>
						    </li>
						   <!--  <li>
						    
								<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
								    <p class="mb-3 text-lg font-semibold ">Rp. {{ number_format($nominal->harga) }}</p>
								    <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
								        Pilih Pembayaran
								        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
								    </a>
								</div>

							</li> -->
						    @endforeach
						    
						</ul>

                		<div class="text-xl mb-5">Pilih Pembayaran :</div>

                		<ul class="grid gap-6 w-full grid-cols-3">
                            @foreach($channels as $channel)
                            <li>
                                <input type="radio" id="{{ $channel->name }}" name="method" value="{{ $channel->code }}" class="hidden peer" required>
                                <label for="{{ $channel->name }}" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">                           
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ ($channel->name) }}</div>
                                    </div>
                                </label>
                            </li>
                            @endforeach
                		</ul>
                		
						<button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 float-right mb-8 mt-16">{{_('Checkout')}}</button>
                    </form>
                	</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>