@extends('layout.index')

@section('title')
    Home
@endsection

@section('content')
    @foreach ($errors->all() as $item)
        {{ $item }}
    @endforeach

    <div class="w-full h-screen bg-slate-300 flex flex-col overflow-hidden justify-center items-center relative">
        <span class="text-slate-500 font-bold text-5xl absolute top-0 translate-y-1/2 mt-10">TODO-LIST</span>
        <form action="{{ Route('home') }}" method="post" class="w-4/5 flex">
            @csrf
            <input type="text" class="outline-none w-full h-12 p-2" name="task">
            <button type="submit" class="bg-green-400 text-slate-50 font-bold w-28 h-12">TAMBAH</button>
        </form>
        <div class="flex w-4/5 h-3/5 gap-4 flex-wrap overflow-y-auto bg-slate-100 p-2">
            @foreach ($Data as $index => $item)
                <div class="w-full h-16 bg-slate-200 flex items-center">
                    <input type="text" id="task-item" class="w-full ml-4 outline-none bg-transparent font-semibold" value="{{ $item['Task'] }}">
                    <div class="flex gap-1">
                        {{-- Update --}}
                        <form action="{{ Route('update') }}" method="post" id="formUpdate">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['Id'] }}">
                            <input type="hidden" name="task" id="task-update" value="{{ $item['Task'] }}">
                            <button type="submit" class="mr-4 bg-blue-500 text-slate-50 font-bold p-2 px-4">UPDATE</button>
                        </form>
                        {{-- Delete --}}
                        <form action="{{ Route('delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['Id'] }}">
                            <button type="submit" class="mr-4 bg-red-500 text-slate-50 font-bold p-2 px-4">DELETE</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
