<x-layout>
    
 <div class="row justify-content-center align-content-center">
        <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
            <h1 class="text-center"><i class="bi bi-plus-square-dotted"></i><br>
                Registrati
            </h1>
            
        </div>
    </div>
    
    
    <x-display-error/>
    <x-display-message/>

    <div class="container mb-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-12 col-md-6">
            <form class="p-4 rounded shadow" action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        aria-describedby="emailHelp">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nome e Cognome</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo</label>
                    <input 
                        type="text" 
                        name="address" 
                        id="address" 
                        class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}"
                        required
                        autocomplete="street-address">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="city" class="form-label">Città</label>
                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" required autocomplete="address-level2">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="postalcode" class="form-label">Codice Postale</label>
                        <input type="text" name="postalcode" id="postalcode" class="form-control @error('postalcode') is-invalid @enderror" value="{{ old('postalcode') }}" required autocomplete="postal-code">
                        @error('postalcode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Paese</label>
                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" required autocomplete="country-name">
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma la Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="form-control"
                        required
                        autocomplete="new-password">
                </div>
 
                <button type="submit" class="btn btn-primary w-100">Registrati</button>
            </form>
        </div>
    </div>
</div>

</x-layout>