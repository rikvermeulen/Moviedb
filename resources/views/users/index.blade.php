@extends('layout')

@section('content')
    <main class="index">
        @include ('layouts.partials.header')
        <section class="container mx-auto px-4 pt-16">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="">
                        <h2>Users Management</h2>
                    </div>
                    <div class="">
                        <a class="" href="{{ route('users.create') }}"> Create New User</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.show',$user->id) }}">Show</a>
                            <a href="{{ route('users.edit',$user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => '']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $data->render() !!}
        </section>
    </main>
    {{--footer--}}
    @include ('layouts.partials.footer')

@endsection
