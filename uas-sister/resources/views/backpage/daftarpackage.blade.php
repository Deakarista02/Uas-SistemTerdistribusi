<x-admin-layout>
<div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>{{$title}}</h6>
              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
              <div class= "grid grid-cols-1 md-grid-clos-2 p-4">
                <div class="span-1">
                <form action="{{route('package.index')}}" method="GET" class="basis-1/2 flex pb-3 place-items-center justify-end">
                    <select name="comunity_id" id="comunity_id" class="mt-1 p-2 w-1/3 border rounded-md mr-2">
                        <option value="">Choose Comunity</option>
                        @foreach ($comunities as $item)
                            <option value="{{$item->comunity_id}}"
                            {{(isset($_GET['comunity_id'])&&$_GET['comunity_id']==$item->comunity_id)?'selected':''}}>{{$item->comunity_name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="s" value="{{(isset($_GET['s']))?$_GET['s']:''}}" class="mt-1 p-2 w-1/3 border rounded-md mr-2">
                    <div class="w-1/3 flex place-items-center justify-start pr-4">
                        <button type="submit" class="bg-gradient-to-tl bg-violet-600 text-white font-bold py-1 px-4 rounded-md">Cari</button>
                    </div>
                </form>
                  <a href="{{ route('package.create') }}">
                    <button class="px-4 py-1 text-sm rounded text-white bg-violet-600 font-semibold border border-purple-200">Tambah</button>
                  </a>
                  
                  
                <div class="p-0 overflow-x-auto">
                  <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        <th class="px-4 py-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Package</th>
                        <th class= "px-2 py-1 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Package Code</th>
                        <th class="px-2 py-1 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($packages as $key=>$item)
                      <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div>
                              <img src= "{{ $item->feature_img }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-24 w-24 rounded-xl" alt="user1" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal">{{$item->package_name}}</h6>
                              <p class="mb-0 text-xs leading-tight text-slate-400">{{$item->comunity->comunity_name}}</p>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        {{$item->package_code}}
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <a href="{{route('package.edit', $item->package_id)}}" class="text-indigo-600 hover:text-indigo-900"> <i class="nav-icon fas fa-pen"></i> Edit</a>
                        <form action="{{route('package.destroy', $item->package_id)}}" method='POST'>
                            @csrf @method ('DELETE')
                            <button class="text-red-600 hover:text-red-900" onclik="return confirm('Anda Yakin?')" type="submit"> <i class="nav-icon fas fa-trash"></i>  Delete</button>
                        </form>
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                 
            <div class="mt-4">{{$packages->links()}}</div>
                </div>
              </div>
            </div>
</div>
</x-admin-layout>