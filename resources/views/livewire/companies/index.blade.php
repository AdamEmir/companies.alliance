<div class="card card-custom mt-5">
    <div class="card-header">
        <div class="card-title">
            <div class="card-label">List of Companies</div>
        </div>
        <div class="card-toolbar">
            <a class="btn btn-primary"
                href="{{route('companies.create')}}">
                <i class="fa fa-plus-square pe-2"></i>Add Company
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center">
                <th>Bil</th>
                <th>Name</th>
                <th>Email</th>
                <th>Official Url</th>
                <th>Logo</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if($companies->isNotEmpty())
                    @foreach($companies as $company)
                        <tr class="text-center">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class="align-middle">{{$company->name}}</td>
                            <td class="align-middle">{{$company->email ?? '-'}}</td>
                            <td class="align-middle">{{$company->website_url ?? '-'}}</td>
                            <td class="align-middle"><img src="{{ Storage::url($company->logo) ?? '-'}}" width="100" height="100" alt="Company Logo"></td>
                            <td class="align-middle">
                                <x-a-btn-icon class="btn-primary mr-2"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              title="Show"
                                                href="{{route('companies.show',$company->id)}}"
                                >
                                    <i class="fa fa-eye"></i>
                                </x-a-btn-icon>
                                <x-a-btn-icon class="btn-warning mr-2"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              title="Edit"
                                              href="{{route('companies.edit',$company->id)}}"
                                >
                                    <i class="fa fa-pen"></i>
                                </x-a-btn-icon>
                                <x-a-btn-icon class="btn-danger mr-2"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              title="Delete"
                                              x-data="deleteCompany"
                                              @click="formDeleteCompany({{ $company->id }})">
                                    <i class="fa fa-trash"></i>
                                </x-a-btn-icon>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan=6" class="text-center">No Data</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div>
                {{ $companies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@script
<script>
    Alpine.data('deleteCompany', ()=>({
        formDeleteCompany(id) {
            Swal.fire({
               title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(response => {
                if(response.isConfirmed) {
                    $wire.destroy(id);
                }
            });
        }
    }));

    $wire.on('deleted', (e) => {
        Swal.fire({
            title: 'Success!',
            icon : 'success',
            text : 'Company has been deleted!',
            confirmButtonText: 'Ok',
        }).then(() => {
            window.location.reload();
        })
    });
</script>
@endscript
