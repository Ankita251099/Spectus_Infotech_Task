<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Company Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile number</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @php
          $no=1
        @endphp
       @if(count($employes)>0)
        @foreach($employes as $employe)
        <tr>
          <th scope="row">{{$no}}</th>
          <td>{{$employe->first_name}}</td>
          <td>{{$employe->last_name}}</td>
          <td>
             @if(!is_null($employe->CompanyNAme))
            {{$employe->CompanyNAme->name}}
            @else
            @endif
          <td>{{$employe->email}}</td>
          <td>{{$employe->mobile_number}}</td>
          <td>
            <a class="badge badge-success shadow-success" href="{{route('employe.edit',$employe->id)}}" 
                                            >
                                             <i class="fa fa-pencil-square" ></i> </a>
                                             <a class="badge badge-danger shadow-danger this_destroy"  data-url="{{route('employe.delete',$employe->id)}}" ><i class="fa fa-trash"></i> </a>
          </td>
        </tr>
        @php
          $no++
        @endphp
        @endforeach
        @else
        <td colspan="12" class="text-center">No Record Found</td>
        @endif

      </tbody>
      
    </table>