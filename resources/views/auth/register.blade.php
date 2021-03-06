<x-guest-layout>
    <div class="row justify-content-center align-items-center height-self-center">
        <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">
                <div class="sign-in-page-data">
                    <div class="sign-in-from w-100 m-auto">
                        <h3 class="pt-5 mb-3 text-center">Sign Up</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control mb-0" name="name" id="name" placeholder="Enter name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control mb-0" name="email" id="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-0" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control mb-0" id="confirmed" name="confirmed" placeholder="Confirm Password" required>
                            </div>
                            <div class="sign-info">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                <div class="custom-control custom-checkbox d-inline-block">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" required>
                                    <label class="custom-control-label" for="customCheck">I accept term and condition</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="d-flex justify-content-center links">
                        Already registered? <a href="{{ route('login') }}" class="text-primary ml-2">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
