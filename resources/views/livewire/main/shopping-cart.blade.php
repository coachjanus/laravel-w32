{{-- resources/views/livewire/main/shopping-cart.blade.php --}}
<div class="w-full bg-white">
    <x-slot name="header">
        <div class="text-center w-full py-12 mb-6 bg-gray-100 border-b">
            <h1 class="text-xl md:text-4xl pb-4 text-gray-900">
                Shopping cart
            </h1>
            <p class="text-gray-500 text-lg mt-1">Best Shop in the universe</p>        
        </div>
    </x-slot>

    <div class="grid grid-cols-4 gap-4 py-8 px-12 md:px-0">
      <div class="col-span-3 mb-12 px-6">
          <table class="w-full text-sm lg:text-base" cellspacing="0">
            <thead>
              <tr class="h-12 uppercase">
                <th class="hidden md:table-cell"></th>
                <th class="text-left">Product</th>
                <th class="lg:text-right text-left pl-5 lg:pl-0">
                  <span class="lg:hidden" title="Quantity">Qtd</span>
                  <span class="hidden lg:inline">Quantity</span>
                </th>
                <th class="hidden text-right md:table-cell">Unit price</th>
                <th class="text-right">Total price</th>
                <th class="text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($cartItems as $item)
                <tr>
                    <td class="hidden pb-4 md:table-cell">
                      <a href="#">
                        <img src="{{ asset(Storage::url($item['attributes']['image'])) }}" class="w-20 rounded" alt="Thumbnail">
                      </a>
                    </td>
                    <td>
                        <a href="#">
                          <p class="mb-2 md:ml-4">{{ $item['name'] }}</p>
                        </a>
                      </td>
                      <td class="justify-center md:justify-end md:flex mt-6">
                        <div class="w-20 h-10">
                            <div class="relative flex flex-row w-full h-8">
                        <livewire:main.cart-update :item="$item" :key="$item['id']" />
                    </div>
                </div>
                      </td>
                      <td class="hidden text-right md:table-cell">
                        <span class="text-sm lg:text-base font-medium">
                          {{ number_format($item['price'], 2) }}€
                        </span>
                      </td>
                      <td class="text-right">
                        <span class="text-sm lg:text-base font-medium">
                            {{ number_format($item['price']*$item['quantity'], 2) }}€
                        </span>
                      </td>
                      <td class="text-right">
                          <button class="mr-2 mt-1 lg:mt-2" wire:click.prevent="remove('{{ $item['id'] }}')">
                            <x-main.trash-alt />
                          </button>
                      </td>
                    </tr>
                @empty
                    <h4>Not items yet</h4>
                @endforelse
            </tbody>
          </table>
      </div>
      <!-- sidebar -->
        <div class="px-6">
            <aside class="rounded shadow overflow-hidden mb-6">
                <h3 class="text-sm bg-gray-100 font-bold text-center text-gray-800 py-3 px-4 border-b uppercase">Order Details</h3>
                
              
              <div class="topics">
                  
                  <div class="flex justify-between border-b">
                    <div class="lg:px-4 lg:py-1 text-lg lg:text-xl font-bold text-center text-gray-800">
                      Subtotal
                    </div>
                    <div class="lg:px-4 lg:py-1 lg:text-lg font-bold text-center text-gray-900">
                      {{ \Cart::getSubTotal() }}€
                    </div>
                  </div>
                    
                    <div class="flex justify-between pt-4 border-b">
                      <div class="lg:px-4 lg:py-1 text-lg lg:text-xl font-bold text-center text-gray-800">
                        Tax
                      </div>
                      <div class="lg:px-4 lg:py-1 lg:text-lg font-bold text-center text-gray-900">
                      {{ round(\Cart::getSubTotal() * $tax, 2) }}€
                      </div>
                    </div>

                    <div class="flex justify-between pt-4 border-b">
                      <div class="lg:px-4 lg:py-1 text-lg lg:text-xl font-bold text-center text-gray-800">
                        Total
                      </div>
                      <div class="lg:px-4 lg:py-1 lg:text-lg font-bold text-center text-gray-900">
                      {{ round(\Cart::getSubTotal() *(1 + $tax), 2) }}€
                      </div>
                    </div>

                  <a href="{{ route('checkout') }}">
                    <button class="flex justify-center w-full px-7 py-2 mt-6 font-medium text-white uppercase bg-indigo-600 rounded-md shadow item-center hover:bg-indigo-700 focus:shadow-outline focus:outline-none">
                        <x-main.credit-card />
                      <span class="ml-2 mt-5px">checkout</span>
                    </button>
                  </a>
              </div>
           </aside>
                    
            

        </div>
        <!-- /sidebar -->
    </div>

</div>