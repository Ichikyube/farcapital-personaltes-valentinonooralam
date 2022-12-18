<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="bg-green-200 py-32 px-10 min-h-screen ">
  <!--   tip; mx-auto -- jagab ilusti keskele  -->
  <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">

    <form action="">

      <!--       flex - asjad korvuti, nb! flex-1 - element kogu ylejaanud laius -->
      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="name" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Text</label>
        <input type="text" id="name" name="name" placeholder="Name"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Number</label>
        <input type="number" id="number" name="number" placeholder="number"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Range</label>
        <input type="range" id="range" name="range" placeholder="range"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">File</label>
        <input type="file" id="file" name="file" placeholder="file"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Date</label>
        <input type="date" id="date" name="date" placeholder="date"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Month</label>
        <input type="month" id="month" name="month" placeholder="month"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Time</label>
        <input type="time" id="time" name="time" placeholder="time"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Password</label>
        <input type="password" id="password" name="password" placeholder="password"
               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
      </div>

      <div class="flex items-center mb-5">
        <!--         tip - here neede inline-block , but why? -->
        <label for="number" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Select</label>
        <select class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
            <option>Surabaya</option>
            <option>Jakarta</option>
            <option>bandung</option>
            <option>Tangerang</option>
        </select>
      </div>

      <div class="text-right">
        <button class="py-3 px-8 bg-green-400 text-white font-bold">Submit</button>
      </div>

    </form>
  </div>
</div>
</body>
</html>

{{-- form petugas cek kesehatan
Kriteria Lolos Donor adalah sebagai

berikut:
- Usia 17-60 tahun (usia 17 tahun
diperbolehkan menjadi donor bila
mendapat izin tertulis dari orangtua)
- Berat badan minimal 45 kg
- Temperatur tubuh 36,6 - 37,5 derajat
Celcius
- Tekanan darah baik yaitu sistole =
110-160 mmHg, diastole = 70-100 mmHg
- Denyut nadi teratur yaitu sekitar 50-100
kali/menit
- Hemoglobin perempuan minimal 12
gram, sedangkan untuk laki-laki minimal
12,5 gram --}}

Tanggal Lahir
Berat Badan
Suhu tubuh
Tekanan darah
Denyut nadi
Hemoglobin
