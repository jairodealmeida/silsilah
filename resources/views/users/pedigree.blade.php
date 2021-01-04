@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.show_pedigree'))

@section('user-content')

<?php
$childsTotal = 0;
$grandChildsTotal = 0;
$ggTotal = 0;
$ggcTotal = 0;
$ggccTotal = 0;
?>
<style type="text/css" >
page {
  background: white;
  display: block;
  margin: 0 auto;

  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
  padding: 50px;
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
</style>

<page size="A4" layout="landscape" style="background-image: url('../../images/background/certify.png');background-repeat: no-repeat;background-size: 100% 100%;">
   
    <table style="width: 100%;">
        <thead>
           <tr>
              <th colspan="5" style="width: 99.8856%;">
                 <div style="text-align: center;">CERTIFICADO DE REGISTRO GENEAL&Oacute;GICO</div>
              </th>
           </tr>
        </thead>
        <tbody>
           <tr>
           
              <td style="width: 29.6339%;"><strong>NOME:</strong><br>{{$user->name}}</td>
              <td colspan="2" style="width: 39.5881%;">
                 <div style="text-align: left;"><strong>PROPRIET&Aacute;RIO:</strong></div>
                 <p style="text-align: left;">{{$user->proprietary ? $user->proprietary->name : '?'}}</p>
              </td>
              <td rowspan="2" style="width: 14.6454%; vertical-align: middle; text-align: center;">
                    <img data-fr-image-pasted="true" 
                    src="./qrcode" width="72" height="72" class="fr-fic fr-dii">
                    
              </td>
              <td rowspan="2" style="width: 16.0183%; vertical-align: middle; text-align: center;">
                @if($user->photo_path)
                    <img data-fr-image-pasted="true" src="/storage/{{$user->photo_path}}" width="200px" height="auto" class="fr-fic fr-dii">
                @else
                    {{ userPhoto($user, ['style' => 'width:200px;max-width:300px']) }}
                @endif
              </td>
           </tr>
           <tr>            
              <td style="width: 29.6339%;"><strong>RA&Ccedil;A:</strong><br>{{($user->animal && $user->animal->race) ? $user->animal->race->name : '?'}}</td>
              <td colspan="2" style="width: 39.5881%;"><strong>N&ordm; DE REGISTRO:</strong><br>{{$user->regiternumber ? $user->regiternumber : '??/??/????/??/?????'}}</td>
           </tr>
           <tr>
              <td style="width: 29.6339%;"><strong>COR:</strong><br>{{($user->animal && $user->animal->genotype) ? $user->animal->genotype : '?'}}</td>
              <td style="width: 20.3661%;"><strong>NASCIMENTO:</strong><br>{{$user->dob ? $user->dob : '????/??/??'}}</td>
              <td style="width: 19.222%;"><strong>SEXO:</strong><br>{{$user->gender=='M' ? 'Macho':'Femea'}}</td>
              <td colspan="2" style="width: 30.5492%;"><strong>EMISS&Atilde;O:</strong><br>{{$user->created_at ? $user->created_at : '????/??/??'}}</td>
           </tr>
           <tr>
              <td style="width: 29.6339%;"><strong>CRIADOR</strong>:<br>{{$user->creator ? $user->creator->title : '?'}}</td>
              <td style="width: 20.3661%;"><br></td>
              <td style="width: 19.222%;"><br></td>
              <td colspan="2" style="width: 30.5492%;"><br></td>
           </tr>
           <tr>
              <td colspan="5" style="width: 99.8833%;"><br>
               
                <div class="panel panel-default table-responsive">
                    <table class="table table-bordered table-striped" style='font-size:80%'>
                        <tbody>
                            <tr style='font-size:70%'>
                                
                                <th style="width: 9%">{{ trans('user.trigrand_fathers') }} </th>
                                <td class="text-center" colspan="1">
                                    
                                    {{ $fatherTriGrandpa1 ? $fatherTriGrandpa1->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandma1 ? $fatherTriGrandma1->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandpa2 ? $motherTriGrandpa2->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandma2 ? $motherTriGrandma2->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandpa3 ? $fatherTriGrandpa3->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandma3 ? $fatherTriGrandma3->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandpa4 ? $motherTriGrandpa4->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandma4 ? $motherTriGrandma4->profileLink('chart') : '?' }}
                                </td>

                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandpa5 ? $fatherTriGrandpa5->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandma5 ? $fatherTriGrandma5->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandpa6 ? $motherTriGrandpa6->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandma6 ? $motherTriGrandma6->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandpa7 ? $fatherTriGrandpa7->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $fatherTriGrandma7 ? $fatherTriGrandma7->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandpa8 ? $motherTriGrandpa8->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="1">
                                    {{ $motherTriGrandma8 ? $motherTriGrandma8->profileLink('chart') : '?' }}
                                </td>
                            </tr>

                            <tr style='font-size:80%''>
                                <th style="width: 9%">{{ trans('user.bigrand_fathers') }}</th>
                                <td class="text-center" colspan="2">
                                    {{ $fatherBiGrandpa1 ? $fatherBiGrandpa1->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $fatherBiGrandma1 ? $fatherBiGrandma1->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $motherBiGrandpa2 ? $motherBiGrandpa2->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $motherBiGrandma2 ? $motherBiGrandma2->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $fatherBiGrandpa3 ? $fatherBiGrandpa3->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $fatherBiGrandma3 ? $fatherBiGrandma3->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $motherBiGrandpa4 ? $motherBiGrandpa4->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="2">
                                    {{ $motherBiGrandma4 ? $motherBiGrandma4->profileLink('chart') : '?' }}
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 9%">{{ trans('user.grand_fathers') }}</th>
                                <td class="text-center" colspan="4">
                                    {{ $fatherGrandpa ? $fatherGrandpa->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="4">
                                    {{ $fatherGrandma ? $fatherGrandma->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="4">
                                    {{ $motherGrandpa ? $motherGrandpa->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="4">
                                    {{ $motherGrandma ? $motherGrandma->profileLink('chart') : '?' }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{ trans('user.fathers') }} </th>
                                <td class="text-center" colspan="8">
                                    {{ $father ? $father->profileLink('chart') : '?' }}
                                </td>
                                <td class="text-center" colspan="8">
                                    {{ $mother ? $mother->profileLink('chart') : '?' }}
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            
            </td>
           </tr>
           <tr></tr>
           <tr>
              <td style="width: 29.6339%;"><br></td>
              <td style="width: 20.3661%;"><br></td>
              <td style="width: 19.222%;"><br></td>
              <td style="width: 30.5492%;"><br></td>
              <td style="width: 30.5492%;"><br></td>
           </tr>
        </tbody>
     </table>
     <!--strong>NINHADA:</strong><br><em>MACHOS: 13</em><br><em>FEMEAS: 4</em-->
     <div class="text-right" style="padding-right:100px;padding-top:150px"><strong >ASSINATURA:</strong></div>
     

</page>


<div class="container">
<hr>
<div class="row">
    <div class="col-md-1">&nbsp;</div>
    @if ($childsTotal)
    <div class="col-md-1 text-right">{{ trans('app.child_count') }}</div>
    <div class="col-md-1 text-left"><strong >{{ $childsTotal }}</strong></div>
    @endif
    @if ($grandChildsTotal)
    <div class="col-md-1 text-right">{{ trans('app.grand_child_count') }}</div>
    <div class="col-md-1 text-left"><strong >{{ $grandChildsTotal }}</strong></div>
    @endif
    @if ($ggTotal)
    <div class="col-md-1 text-right">Jumlah Cicit</div>
    <div class="col-md-1 text-left"><strong >{{ $ggTotal }}</strong></div>
    @endif
    @if ($ggcTotal)
    <div class="col-md-1 text-right">Jumlah Canggah</div>
    <div class="col-md-1 text-left"><strong >{{ $ggcTotal }}</strong></div>
    @endif
    @if ($ggccTotal)
    <div class="col-md-1 text-right">Jumlah Wareng</div>
    <div class="col-md-1 text-left"><strong >{{ $ggccTotal }}</strong></div>
    @endif
    <div class="col-md-1">&nbsp;</div>
</div>
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection
