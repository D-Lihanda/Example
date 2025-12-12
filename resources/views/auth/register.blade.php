<x-layout>
  <x-slot name="heading">
     Register
  </x-slot>

<form method="POST" action="/register">
  @csrf

  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
        <x-form-field >
          <x-form-label for="first_name" >First Name</x-form-label>
          <div class="mt-2">
            <x-form-input id="first_name"  name="first_name" required/>

            <x-form-error name="first_name" />
          </div>
        </x-form-field>

        <x-form-field >
          <x-form-label for="last_name" >Last Name</x-form-label>
          <div class="mt-2">
            <x-form-input id="last_name"  name="last_name" required/>

            <x-form-error name="last_name" />
          </div>
        </x-form-field>

        <x-form-field >
          <x-form-label for="email" >Email</x-form-label>
          <div class="mt-2">
            <x-form-input id="email"  name="email" type="email" required />

            <x-form-error name="email" />
          </div>
        </x-form-field>


          <x-form-field >
          <x-form-label for="password" >Password</x-form-label>
          <div class="mt-2">
            <x-form-input id="password"  name="password" type="password" required />

            <x-form-error name="password" />
          </div>
        </x-form-field>

          <x-form-field >
          <x-form-label for="password_confirmation" >Confirm Password</x-form-label>
          <div class="mt-2">
            <x-form-input id="password_confirmation"  name="password_confirmation" type="password" required />

            <x-form-error name="password_confirmation" />

          </div>
        </x-form-field>

      </div>
    </div>
      
      

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" class="text-sm/6 font-semibold text-white">Cancel</a>
    <x-form-button>Register</x-form-button>
  </div>
</form>


</x-layout>

