@extends('layouts.front-end')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3"><i class="fa fa-list icon-jumbotron"></i> Onze visie als organisatie,</h1>
            <p class="lead">
                Elke organisatie, VZW heeft een visie. Inclusief Activisme_BE.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 card br-card card-shadow">
                    <img class="card-img-top" style="border-top-left-radius: 5px; border-top-right-radius: 5px;" height="200" src="{{ asset('img/banner.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h3>Over ons:</h3>

                        <p>
                            Met ons klein team dat opkomt voor wereldvrede en de rechten van de mensen, gebruiken
                            we deze website, activisme.be, als uitvalsbasis. activisme.be wil een platform bieden
                            om mensen en organisaties samen te brengen en vanuit een verenigd front te laten strijden voor
                            onze belangen die naar ons gevoel maar al te vaak op de helling worden gezet. Naast
                            zichtbare aanwezigheid op tal van demonstraties, parades en betogingen organiseren wij ook zelf initiatieven,
                            straatacties en ludieke (protest)acties. De wesbite activisme.be is de plaats bij uitstek waar we
                            ruchtbaarheid kunnen geven aan deze acties, initiatieven, betogingen en demonstraties.
                        </p>

                        <p>
                            Daarnaast leggen we via activisme.be online petities en petitielijsten aan, die wijds kunnen
                            uitgestuurd worden naar onze achterban. Andere organisaties, personen en bewegingen kunnen gratis
                            gebruik maken van dit platform op petities voor de geode zaak op te stellen en te verspreiden.
                        </p>

                        <h3>Kort overzicht:</h3>

                        <p>Om u nog eens een kort overzicht te geven van onze visie willen wij u de volgende punten meegegeven.</p>

                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-weight-bold">Wie zijn we?</h5>

                                <ul class="list-unstyled">
                                    <li><strong class="text-danger">*</strong> We zijn een klein team dat opkomt voor wereldvrede en de rechten van de mens en het kind.</li>
                                    <li><strong class="text-danger">*</strong> Wij zijn actief zowel met web acties als met acties op straat en ludieke vredes acties.</li>
                                    <li><strong class="text-danger">*</strong> Ons platform bestaat uit een klein heel actief team, allemaal vrijwilligers die zich 100% inzetten voor de vele dingen waarvoor we moeten strijden.</li>
                                    <li><strong class="text-danger">*</strong> We zijn onafhankelijk van politieke organisaties en of andere!</li>
                                    <li><strong class="text-danger">*</strong> Wij worden in leven gehouden door vrijwilligers , eigen financiële inbreng en door giften van mensen die onze organisatie steunen.</li>
                                </ul>
                            </div>

                            <div class="col-12">
                                <h5 class="font-weight-bold">Wat doen we?</h5>

                                <ul class="list-unstyled">
                                    <li><strong class="text-danger">*</strong> Onze bedoeling is om zowel mensen als organisaties samen te brengen om te strijden voor de belangen van de rechten van de mens en het kind!</li>
                                    <li><strong class="text-danger">*</strong> Op gebied van internet maken we petities op, eventuele andere online acties met dank aan ons web-team. En die bieden we ook gratis aan voor organisaties die dit willen.</li>
                                    <li><strong class="text-danger">*</strong> Naast activisme hebben we ook een beweging die voedsel, kledij en dringende benodigdheden inzamelt voor de armen, daklozen en mensen in nood.</li>
                                    <li><strong class="text-danger">*</strong> Wij bieden ook educatieve momenten aan zoals lezingen , vergaderingen enz….</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection