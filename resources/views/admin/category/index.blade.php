@extends('tablar::page')

@section('title')
    Category
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        List
                    </div>
                    <h2 class="page-title">
                        {{ __('Category ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create Category
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">

            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                        </div>
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Categoría</th>
                                    <th>Subcategorías</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->children->count() > 0)
                                                <ul>
                                                    @foreach ($category->children as $child)
                                                        <li>{{ $child->name }}</li>


                                                        @if ($child->children->count() > 0)
                                                            @foreach ($child->children as $grandchild)
                                                                <ul>
                                                                    <li>{{ $grandchild->name }}</li>
                                                                </ul>
                                                            @endforeach

                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @else
                                            No subcategories
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
