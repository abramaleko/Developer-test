    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="py-12">
                <h1 class="text-xl text-gray-600 float-left pl-6">Contacts</h1>
                <button wire:click="createContact" class="bg-blue-700 hover:bg-blue-400 text-white px-4 py-2 rounded-md float-right mr-6"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Contact</button>
            </div>
            <div class="border-b-2 border-gray-200"></div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($contactInfo as $info)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10"> 
                                        <img class=" w-10 {{$info->profile_url ? 'h-10' : 'h-8'}} rounded-full" src="{{($info->profile_url !=null ? asset('storage/'.$info->profile_url ): asset('images/user-default.png')) }}" alt="{{$info->name}}">
                                        </div>
                                        <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$info->name}}
                                        </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$info->email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$info->address}}</div>
                                      </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{$info->created_at->diffForHumans()}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left text-lg font-medium">
                                    <div x-data="{ open: false }" class="flex">
                                        <button @click="open = true" class=" focus:outline-none text-gray-700 inline"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                                            <ul x-show="open" @click.away="open = false" class="ml-4 border-2 border-gray-400 text-sm rounded-md">
                                                <li wire:click="editContact({{$info->id}})"  class="px-4 text-gray-700 py-1 hover:bg-blue-100 cursor-pointer">Edit</li>
                                                <div class="border-b border-gray-200"></div>
                                                <li wire:click="deleteContact({{$info->id}})"  class="px-4 text-gray-700 py-1 hover:bg-blue-100 cursor-pointer">Delete</li>
                                            </ul>
                                    </div>
                                    </td>
                                </tr> 
                                @endforeach
                    
                                <!-- More items... -->
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
        </div>

        <x-confirm-modal wire:model="modalContact" max-width="3xl">

        <x-slot name="title">
            {{ __('Create contact') }}
        </x-slot>

        <x-slot name="content">
           <div class="px-6">
               <div class="flex flex-wrap">
                    {{-- inputs --}}
                   <div class="">
                    
                    {{-- displays all error messages --}}
                    @foreach ($errors->all() as $message)
                    <span class="text-sm block text-red-700 font-bold py-1">{{$message}}</span>
                    @endforeach

                        <input type="hidden" wire:model="ContactId">
                       <div class="flex my-3">
                           <label for="name" class="inline text-gray-700 text-lg">Name:</label>
                           <input type="text" wire:model="name" class="text-gray-600 form-input ml-7 w-3/4 px-5 border-2 border-blue-500 rounded-md" id="name" placeholder="Please enter your name">
                        </div>

                       <div class="flex my-3">
                        <label for="email" class="inline text-gray-700 text-lg">Email:</label>
                        <input type="email" wire:model="email" class=" text-gray-600 form-input ml-7 w-3/4 px-5 border-2 border-blue-500 rounded-md" id="email" placeholder="test@domain.com">
                    </div>

                    <div class="flex my-3">
                        <label for="address" class="inline text-gray-700 text-lg">Address:</label>
                        <input type="email" wire:model="address" class=" text-gray-600  form-input ml-3  w-4/6 px-5 border-2 border-blue-500 rounded-md" id="address" placeholder="Mbezi Beach street">
                    </div>
                   </div>
                   <div class="md:ml-28">
                       <div class="border-2 border-gray-200 w-48 rounded-md  mb-6">
                           @if ($contactPhoto)
                              <img src="{{(gettype($contactPhoto) == 'string') ? asset('storage/'.$contactPhoto )  : $contactPhoto->temporaryUrl()}}" alt="no-profile image" class=" md:h-36 w-full  rounded-md">
                           @else
                           <img src="{{asset('images/user-default.png')}}" alt="no-profile image" class="m-auto py-6">

                           @endif
                       </div>
                       <div class="inline">
                        <label for="contact_profile" class="relative cursor-pointer text-white hover:text-black bg-gray-400 hover:bg-gray-200  rounded-md px-6 py-2">
                            <input id="contact_profile" wire:model.defer="contactPhoto" type="file" class="sr-only"/>
                           {{$contactPhoto ? 'Update photo' : ' Upload photo '}}
                        </label> 
                       </div>
                   </div>

               </div>
           </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="$toggle('modalContact')" class="text-black text-base  bg-gray-300 font-light hover:bg-gray-600 hover:text-white px-4 py-2 mr-4 ">CLOSE</button>
            <button  wire:click="createNewContact" class="text-white text-base bg-blue-700 font-light hover:bg-gray-500 px-4 py-2 ">SAVE</button>
        </x-slot>

        </x-confirm-modal>
   </div>
</div>


