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
      <h1 style="text-align: center;" class="header_title"> {!!$contrat->name!!} </h1>
    </div>
  </header>


  <main>

    @foreach ($partieContrats as $partieContrat)

    <p class="text_bloc">{!! $partieContrat->contenu !!}</p>

        @foreach ($articleContrats as $articleContrat)
            @if ($partieContrat->id == $articleContrat->contrat_partie_id)
                <p class="text_article">{!! $articleContrat->intitule_article !!} : {!! $articleContrat->titre_article !!}</p>

                <p class="text_mini_margin">{!! $articleContrat->contenu !!}</p>
            @endif

        @endforeach

    @endforeach

  </main>
</body>
</html>
