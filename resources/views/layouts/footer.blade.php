
<footer>
  <section class="foot-bg home-footer">
   
<!--     <div class="container">
      <div class="text-center light-g-t bottom-line">{{ env('APP_NAME') }} © {{Date('Y')}} </div>
    </div> -->
  </section>
</footer>
  
  <script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyAOFxgkRhB6WKRISnaCfdD3Gb0BufAVUAc&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

<script type="text/javascript" src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
        <script>
            var autocomplete;
            function initialize() {
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
              });
            }
        </script>

