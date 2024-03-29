@extends('client.layouts.master')
@section('title', 'Noad - Hãy chọn địa điểm')
@section('title-content', 'Noad - Hãy chọn địa điểm')
@section('content')
    <!-- BEGIN: Content -->
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Item List -->
            <div class="intro-y col-span-12 lg:col-span-9 xl:ml-64">
                <div class="lg:flex intro-y">
                    <div class="relative">
                        <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="Search item...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search"></i>
                    </div>
                    <select class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option>Sort By</option>
                        <option>A to Z</option>
                        <option>Z to A</option>
                        <option>Lowest Price</option>
                        <option>Highest Price</option>
                    </select>

                </div>
                <div class="grid grid-cols-12 gap-5 mt-5">
                    @foreach($floors as $value)
                        <a href="{{ route('show-table', $value->id) }}" class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                            <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                                <div class="font-medium text-base">{{$value->name}}</div>

                                <div class="text-slate-500">{{$value->tables_count}} Bàn </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t">

                    @yield('table')

                </div>
            </div>
            <!-- END: Item List -->
        </div>

@endsection
