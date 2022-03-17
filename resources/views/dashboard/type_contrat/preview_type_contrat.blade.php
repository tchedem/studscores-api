<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contrat de Bail</title>
  <style>
    *{
      margin: 0; padding: 0; box-sizing: border-box;
    }
    body{
      /* border: 1px solid black; */
      margin: 60px 40px;
    }
    header{
      padding: 20px;
    }
    .header{
      /*border: 1px solid black;*/
    }
    .header_title{/*border: 1px solid black;*/
      background-color: rgba(199, 225, 233, 0.842);
      font-size:large;
      padding-top: 15px;
      padding-bottom: 15px;
      /* padding: 50px; */
      border: 1px solid black;
    }
    .text_bloc{margin: 18px 0;}
    main{text-justify: justify;}
    .text_bold{font-weight: bold;}
    .text_article{font-weight: bold; margin: 8px 0;}
    .text_mini_margin{margin: 4px 0;}

  </style>
</head>
<body>
  <header>
    <div class="header">
      <h1 style="text-align: center;" class="header_title"> {!!$typeContrat->name!!} </h1>
    </div>
  </header>


  <main>

    @foreach ($partieTypeContrats as $partieTypeContrat)

    <p class="text_bloc">{!! $partieTypeContrat->contenu !!}</p>

        @foreach ($articleTypeContrats as $articleTypeContrat)
            @if ($partieTypeContrat->id == $articleTypeContrat->type_contrat_partie_id)
                <p class="text_article">{!! $articleTypeContrat->intitule_article !!} : {!! $articleTypeContrat->titre_article !!}</p>

                <p class="text_mini_margin">{!! $articleTypeContrat->contenu !!}</p>
            @endif

        @endforeach

    @endforeach



    {{-- <p class="text_bloc">ENTRE </p>

    <p class="text_bloc">La Société Béninoise d’Infrastructures Numériques (SBIN), Société Anonyme Unipersonnelle, au capital social de 100.000.000 FCFA, immatriculée au Registre de Commerce et du Crédit Mobilier du Bénin sous le numéro RCCM RB/COT/19 B 23773, BP 80 Cotonou -- Téléphone : (229) 21 31 20 46 / 21 31 20 47 – E-mail : contact@sbin.bj, IFU : 32019910650626 ayant son siège social à Immeuble Ex Bénin Télécom, Avenue Clozel, Ganhi, Cotonou, République du Bénin, représentée pour les besoins des présentes par Madame Thérèse TOUNKARA, sa Directrice Générale,</p>

    <p class="text_bloc">Ci-après dénommée « la SBIN », ou « Le preneur » d’une part,</p>

    <p class="text_bloc">Et</p>

    <p class="text_bloc">Monsieur…….., de nationalité …….., titulaire du passeport n° …….. délivré le……. expirant le E……..,dont le n°IFU est le……………….. , représentée par Monsieur……….,  par procuration en date du ……. titulaire de la carte nationale d’identité n° …….. délivrée par la ………… et qui expire le ……………., domiciliée à Cotonou, quartier , lot n° , tél +
    </p>

    <p class="text_bloc">Ci-après dénommée «le Bailleur», d'autre part,</p>

    <p class="text_bloc">Ci- après collectivement désignés « les Parties »</p>

    <p class="text_bloc text_bold">Il a été convenu et arrêté ce qui suit :</p>

    <p class="text_bloc">
      <p class="text_article">ARTICLE 1.</p>
      <p>Le Bailleur donne à bail d’habitation au Preneur, qui accepte, la villa désignée ci-après.</p>
    </p>

    <p class="text_bloc">
      <p class="text_article">ARTICLE 2.</p>
      <p class="text_mini_margin">Le Bailleur donne à bail d’habitation au Preneur, qui accepte, la villa désignée ci-après.</p>
      <p>Le bien objet du présent bail consiste en une villa sise à CENSAD AGBLANGANDAN et faisant objet de la réquisition d’immatriculation n°…..du ……. comprenant :</p>
    </p>

    <p class="text_bloc">
      <p class="text_article">ARTICLE 3.</p>
      <p class="text_mini_margin">Le Bailleur donne à bail d’habitation au Preneur, qui accepte, la villa désignée ci-après.</p>
      <p>Le bien objet du présent bail consiste en une villa sise à CENSAD AGBLANGANDAN et faisant objet de la réquisition d’immatriculation n°…..du ……. comprenant :</p>
    </p>  --}}

  </main>
</body>
</html>
