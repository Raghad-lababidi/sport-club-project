<div class="container">
    <div class="py-5 text-center">
      <x-headline text="Subscribe form"/>


      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">information</h4>

        <form class="needs-validation" novalidate=""  method="POST" action="{{ route('form') }}">
          <div class="row g-3">
            <div class="col-md-6">
              <x-input name="name" :label="['text' => 'First name']"/>
            </div>

            <div class="col-md-6">
              <x-input name="lastname" :label="['text' => 'Last name']" required/>
            </div>

            <div class="col-12">
              <label for="username">Username</label>
              {{--Input groups coming soon--}}
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <x-input
                name="email"
                :label="['text' => 'Email <span class=\'text-muted\'>(Optional)</span>']"
                type="email"
                placeholder="you@example.com"
              />
            </div>


            <div class="col-md-5">
              <x-select
                class="custom-select d-block w-100"
                name="country"
                :label="[
                  'text' => 'Country'
                ]"
                :options="['Choose...','Syria']"
              />
            </div>

            <div class="col-md-4">
              <x-select
                  class="custom-select d-block w-100"
                  name="state"
                  :label="[
                  'text' => 'State'
                ]"
                  :options="['Choose...', 'Damascus','Aleppo','Homs']"
              />
            </div>

            <div class="col-md-4">
                <x-select
                    class="custom-select d-block w-100"
                    name="sport"
                    :label="[
                    'text' => 'Sport'
                  ]"
                    :options="['Choose...', 'Football','Gym']"
                />
              </div>


          <button class="btn btn-primary btn-lg btn-block" type="submit">submit</button>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2024-2025 Company Name</p>
      @php
        $example = [
          [
            'text' => 'Privacy',
            'href' => '#',
          ],
          [
            'text' => 'Terms',
            'href' => '#',
          ],
          [
            'text' => 'Support',
            'href' => '#',
          ],
        ]
      @endphp

      <ul class="list-inline">
        @foreach($example as $item)
          <li class="list-inline-item">
            <x-link :all="$item"/>
          </li>
        @endforeach
      </ul>
    </footer>
  </div>

  @push('js')
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        'use strict'

        window.addEventListener('load', function () {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation')

          // Loop over them and prevent submission
          Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
              }
              form.classList.add('was-validated')
            }, false)
          })
        }, false)
      }())
    </script>
  @endpush
