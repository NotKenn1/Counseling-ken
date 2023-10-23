@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, and Remove Notes!</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Notes</h5>
                        </div>
                        <div class="ms-md-3 pe-md-3 d-flex align-items-left">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control form-control-navbar" name="" id="search-item" placeholder="Search by Name" onkeyup="search()">
                            </div>
                            <script>
                                function search(){
                                    var td, tr, searchbox, table, filter, textvalue;
                                    searchbox = document.getElementById("search-item")
                                    filter = searchbox.value.toUpperCase()
                                    table = document.getElementById("table-data")
                                    tr = table.getElementsByTagName("tr")

                                    for(var i = 0; i < tr.length; i++){
                                        td = tr[i].getElementsByTagName('td')[1];
                                        if(td){
                                            textvalue = td.textContent || td.innerText;

                                            if(textvalue.toUpperCase().indexOf(filter) > -1){
                                                tr[i].style.display = "";
                                            }else{
                                                tr[i].style.display = "none";
                                            }
                                        }
                                    }
                                }
                            </script>
                            </div>
                        <a href="{{route('noteKel.create')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Note</a>
                    </div>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-responsive" id ="table-data">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama Pembimbing
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tanggal Rencana
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tanggal Realisasi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Materi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($notesK as $note)
                                <tr>
                                        <td class="ps-4 text-s font-weight-bold mb-0">
                                            {{$note->user->namaUser}}
                                        </td>
                                        <td class="text-center text-s font-weight-bold mb-0">
                                            {{ $note->tglRencanaPelaksanaan }}
                                        </td>
                                        <td class="p-2 text-center text-s font-weight-bold mb-0">
                                            {{ $note->tglRealisasiPelaksanaan }}
                                        </td>
                                        <td class="text-center text-s font-weight-bold mb-0">
                                            {{ Str::limit($note->materi, 30, '...')}}
                                        </td>
                                        <td class="text-center ">
                                            <a href="{{route('noteKel.edit', $note->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Note">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                            <a href="{{route('noteKel.destroy', $note->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Remove Note">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                            </span>
                                        </td>
                                @empty

                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
