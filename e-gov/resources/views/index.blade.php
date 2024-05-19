<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Help Desk</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container d-flex align-items-start justify-content-start">
            <a class="navbar-brand" href="#"><img style="height: 100px; width: 100px; margin-right: 20px;" src="{{ asset('images/naguilian.jpg') }}" alt="Your Logo"></a>
            <div style="text-align: left;">
                <h1 style="font-weight: bold; font-size: 24px; margin-top: 20px;">Barangay Electronic Help Desk</h1>
                <h3 style="font-size: 14px; margin-top: 10px;">Suguidan Norte, Naguilian, La Union, 2511</h3>
            </div>
        </div>
    </nav>
    <br>
<div class="container">
                    <form>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="cpNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="cpNumber">
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option id="def">Select Gender</option>
                                <option id="male">Male</option>
                                <option id="female">Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <select class="form-control" name="barangay" id="barangay">
                            <option value="">Select Barangay</option>
                            <option value="Aguioas">Aguioas</option>
                            <option value="Al-alinao Norte">Al-alinao Norte</option>
                            <option value="Al-alinao Sur">Al-alinao Sur</option>
                            <option value="Ambaracao Norte">Ambaracao Norte</option>
                            <option value="Ambaracao Sur">Ambaracao Sur</option>
                            <option value="Angin">Angin</option>
                            <option value="Balecbec">Balecbec</option>
                            <option value="Bancagan">Bancagan</option>
                            <option value="Baraoas Norte">Baraoas Norte</option>
                            <option value="Baraoas Sur">Baraoas Sur</option>
                            <option value="Bariquir">Bariquir</option>
                            <option value="Bato">Bato</option>
                            <option value="Bimmotobot">Bimmotobot</option>
                            <option value="Cabaritan Norte">Cabaritan Norte</option>
                            <option value="Cabaritan Sur">Cabaritan Sur</option>
                            <option value="Casilagan">Casilagan</option>
                            <option value="Dal-lipaoen">Dal-lipaoen</option>
                            <option value="Daramuangan">Daramuangan</option>
                            <option value="Guesset">Guesset</option>
                            <option value="Gusing Norte">Gusing Norte</option>
                            <option value="Gusing Sur">Gusing Sur</option>
                            <option value="Imelda">Imelda</option>
                            <option value="Lioac Norte">Lioac Norte</option>
                            <option value="Lioac Sur">Lioac Sur</option>
                            <option value="Magungunay">Magungunay</option>
                            <option value="Mamat-ing Norte">Mamat-ing Norte</option>
                            <option value="Mamat-ing Sur">Mamat-ing Sur</option>
                            <option value="Nagsidorisan">Nagsidorisan</option>
                            <option value="Natividad">Natividad</option>
                            <option value="Ortiz">Ortiz</option>
                            <option value="Ribsuan">Ribsuan</option>
                            <option value="San Antonio">San Antonio</option>
                            <option value="San Isidro">San Isidro</option>
                            <option value="Sili">Sili</option>
                            <option value="Suguidan Norte">Suguidan Norte</option>
                            <option value="Suguidan Sur">Suguidan Sur</option>
                            <option value="Tuddingan">Tuddingan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sitio" class="form-label">Sitio</label>
                            <input type="text" class="form-control" id="sitio">
                        </div>

                        <div class="mb-3">
                            <label for="visit" class="form-label">Purpose of Visit</label>
                            <select class="form-control" name="visit" id="visit">
                            <option id="">Select Purpose of Visit</option>
                            <option id="personal">Personal Errands and Documentation</option>
                            <option id="gov">Government and Administrative Services</option>
                            <option id="health">Health and Social Services</option>
                            <option id="community">Community Events and Activities</option>
                            <option id="educ">Education and Information</option>
                            <option id="eco">Economic Activities</option>
                            <option id="env">Environmental and Infrastructure Concerns</option>
                            <option id="report">Safety and Security Report</option>
                            </select>   
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal" style="display: none;">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    </div>


    @vite(['resources/js/app.js'])
</body>
</html>