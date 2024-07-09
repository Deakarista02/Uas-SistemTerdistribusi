<x-home-layout>
    <div class='container'>
        <h2>admin</h2>
        <table class="border">
            <thead>
                <tr>
                    <td>Nama</td><td>Deskripsi</td><td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $item)
                <tr>
                    <td>{{$item->package_name}}</td>
                    <td>{{$item->package_desc}}</td>
                    <td>
                        <a href="{{route('adminpackage.edit', $item->package_id)}}">edit</a>
                        <form action="{{route('adminpackage.destroy', $item->package_id)}}" method='POST'>
                            @csrf @method ('DELETE')
                            <button type="submit">del</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php if (Request::path()=='package') {?>
        <div class="m-4">{{$packages->appends(request()->query())->links()}}</div>
    <?php } ?>
</x-home-layout>