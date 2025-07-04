<x-layout>

    <div class="row justify-content-center align-content-center ">
        <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
            <h1 class="text-center"><i class="bi bi-person-circle"></i><br>
                Login
            </h1>

        </div>
    </div>

    <x-display-error />
    <x-display-message />


    <div class="container flex mb-5 height-custom">
        <div class="row mt-5 justify-content-center align-content-center">
            <div class="col-12 col-md-6">

                <form class="p-4 rounded shadow" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" required
                            autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Accedi</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>



</x-layout>