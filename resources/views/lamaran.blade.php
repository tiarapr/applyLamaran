<!DOCTYPE html>
<html>

<head>
    <title>Energeek - Apply Lamaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="w3hubs.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <!-- css -->
    <link href="{{ asset('assets/css/lamaran.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <form class="lamaran-form" action="{{ route('applyLamaran') }}" method="POST">
                    @csrf
                    <div>
                        <h5>Apply Lamaran</h5>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="form2Example18">Jabatan</label>
                        <select class="form-select form-select-lg mb-3" name="jobId" aria-label=".form-select-lg example">
                            <option selected>Pilih Jabatan</option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="form2Example18">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="form2Example18">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="form2Example18">Telepon</label>
                        <input type="number" class="form-control" placeholder="Telepon" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label>Tahun Lahir</label>
                        <select class="form-control" name="year" required>
                            <?php
                            for ($year = (int)date('Y'); 1900 <= $year; $year--) : ?>
                                <option value="<?= $year; ?>"><?= $year; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="form2Example18">Skill Set</label>
                        <select class="form-select form-select-lg mb-3" name="skillId" aria-label=".form-select-lg example">
                            <option selected>Pilih Skill</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-default btn-apply">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>