@extends('layout')
@section('link-active-monitoring','active')
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Monitoring Bantuan Modal</h3>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('bantuanmodal.monitoring.create')}}" class="btn btn-sm btn-primary px-2 py-1">Create</a>
            </div>
            <div class="app-card shadow bg-white">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover text-left mb-0">
                            <thead>
                                <tr>
                                    <th class="cell">No.</th>
                                    <th class="cell">No.</th>
                                    <th class="cell">No.</th>
                                    <th class="cell">No.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">No.</td>
                                    <td class="cell">No.</td>
                                    <td class="cell">No.</td>
                                    <td class="cell">No.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection