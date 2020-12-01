@extends('admin.layout.master')
@section('content')
<link rel="stylesheet" href="{{ asset('admin/assets/css/lib/chosen/chosen.css') }}">
<script src="{{ asset('admin/assets/js/lib/chosen/chosen.jquery.js') }}"></script>


<script>
    jQuery(document).ready(function() {
        jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });

</script>

<div class="row">
<div class="col-md-12">


<div class="card">
                      <div class="card-header">
                          <strong class="card-title"> {{ $page_name }} </strong>
                      </div>
                      <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                  @if(count($errors) > 0)
                  <div class="alert alert-danger" role="alert">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li> {{ $error }} </li>
                      @endforeach

                    </ul>
                </div>
                  @endif
                                
                                <hr>

  {{ Form::open(array('url' => '/back/employe/store','method'=>'post')) }}
                               
                                    
                        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'control-label mb-1')) }}
                                    
          {{ Form::text('name',null,['class'=>'form-control','id'=>'name'] )  }}
                              </div>

                        <div class="form-group">
        {{ Form::label('prenom', 'prenom', array('class' => 'control-label mb-1')) }}
                                                          
        {{ Form::text('prenom',null,['class'=>'form-control','id'=>'prenom'] )  }}
                                                    </div>

                <div class="form-group">
                    {{ Form::label('fonction', 'fonction', array('class' => 'control-label mb-1')) }}
                                                                                                                     
                   {{ Form::text('fonction',null,['class'=>'form-control','id'=>'fonction'] )  }}
                           </div>
                                                    

                               <div class="form-group">
          {{ Form::label('email', 'Email', array('class' => 'control-label mb-1')) }}
                                    
           {{ Form::email('email',null,['class'=>'form-control','id'=>'email'] )  }}
                              </div>

                               <div class="form-group">
          {{ Form::label('password', 'Password', array('class' => 'control-label mb-1')) }}
                                    
          {{ Form::password('password',['class'=>'form-control','id'=>'password'] )  }}
                              </div>
                      

              <div>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                      <i class="fa fa-lock fa-lg"></i>&nbsp;
                      <span id="payment-button-amount">enregistrez</span>
                      <span id="payment-button-sending" style="display:none;">enregistrement en cours …</span>
                  </button>
              </div>
                                {{ Form::close() }}
                            </div>
                        </div>

                      </div>
                  </div> <!-- .card -->
  </div>
 
</div>

 @endsection                 