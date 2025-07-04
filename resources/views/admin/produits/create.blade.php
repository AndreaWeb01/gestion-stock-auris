@extends('layouts.base')

@section('content')

   <div class="container-fluid">

                        <!-- start page title -->
                        <div class="py-3 py-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="page-title mb-0">Form Validation</h4>
                                </div>
                                <div class="col-lg-6">
                                   <div class="d-none d-lg-block">
                                    <ol class="breadcrumb m-0 float-end">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Form Validation</li>
                                    </ol>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Bootstrap Validation - Normal</h4>
                                        <p class="sub-header">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p>

                                        <form class="needs-validation" novalidate>
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">First name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationCustomUsername" class="form-label">Username</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">State</label>
                                                <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="validationCustom05" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        Agree to terms and conditions
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </form>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                        <!-- end row -->

                    </div> <!-- c

    <a href="{{ route('produits.index') }}">Retour à la liste des produits</a>
    @endsection

</body>
</html>
