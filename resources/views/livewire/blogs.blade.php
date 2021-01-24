
{{--@include ('layouts.partials.header')--}}
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage blogs
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-secondary overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-secondary border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-button hover:bg-button text-white font-bold py-2 px-4 rounded my-3">Create New Blog</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Body</th>
                    <th class="px-4 py-2">Author</th>
                    <th class="px-4 py-2">last edited</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
                <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
                <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
                @foreach($blogs as $blog)
                    <tr>
                        <td class="border px-4 py-2">{{ $blog->id }}</td>
                        <td class="border px-4 py-2">{{ $blog->title }}</td>
                        <td class="border px-4 py-2">{{ $blog->body }}</td>
                        <td class="border px-4 py-2">{{ $blog->author }}</td>
                        <td class="border px-4 py-2">{{ $blog->user->name }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $blog->id }})" class="bg-button hover:bg-button text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $blog->id }})" class="bg-button hover:bg-button text-white font-bold py-2 px-4 rounded">Delete</button>
                            <input data-id="{{$blog->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $blog->status ? 'checked' : '' }}>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var blog_id = $(this).data('id');
            console.log(status);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/blogChangeStatus',
                data: {'status': status, 'blog_id': blog_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    })
</script>
