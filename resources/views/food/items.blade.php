@include('includes.header')

<!-- loop to create item titles -->
<div id='item-titles-container'>

     @foreach($Items as $Item)

        <div id='selection-id-{{ $Item->id }}' class='item-selection' onclick='openItem({{ $Item->id }})'>
        <img src="{{ asset('icons/right.svg')}}" class='item-icon' title='Open' alt='Item'>
        <div class='item-name'>{{ $Item->ItemName }}</div>
        <div class='item-count-servings'>{{ $Item->ServingCount }}</div>
        </div>

    @endforeach

</div>

<!-- single item container that is moved under the corresponding title -->
<div id='item-container'>

    <!-- helper fields for the calculation with javascript -->
    <div id='item-id' style='display: none;'></div>
    <div id='item-carbs' style='display: none;'></div>

    <!-- upper output area -->
    <div id='item-container-top'>

        <div id='item-box-first'>
            <p class='NutritionalValuesTitle'>Nährwerte</p>
            <p>Kohlenhydrate</p>
            <p>davon Zucker</p>
            <p>Nahrungsfasern</p>
            <p>Fettgehalt</p>
        </div>

        <div id='item-box-second'></div>
        <div id='item-box-third'></div>

    </div>

    <!-- lower slider area -->
    <div id='item-container-bottom'>
        <!-- size number -->
        <div class='slider-container-left'>
            <p class='slider-title'>Menge</p>
            <p id='slider-value-size' class='slider-value'>100</p>
        </div>
        <!-- size slider -->
        <div class='slider-container-right'>
            <input type='range' id='slider-size' class='slider' min='0' max='500' step='5' value='1'>
        </div>
        <!-- factor number -->
        <div class='slider-container-left'>
            <p class='slider-title'>Faktor</p>
            <p id='slider-value-factor' class='slider-value'>1</p>
        </div>
        <!-- factor slider -->
        <div class='slider-container-right'>
            <input type='range' id='slider-factor' class='slider' min='0.1' max='5' step='0.1' value='1'>
        </div>
        <!-- bolus number -->
        <div class='slider-container-left'>
            <p class='slider-title'>Bolus</p>
            <p id='slider-value-bolus' class='slider-value'></p>
        </div>
        <!-- bolus slider -->
        <div class='slider-container-right'>
            <input type='range' id='slider-bolus' class='slider' min='0' max='20' step='0.1' value='1'>
        </div>
    </div>
</div>

@include('includes.footer')