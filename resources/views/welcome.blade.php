<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{asset('tailwind.js')}}"></script>
</head>

<body class="flex justify-center items-center h-[100vh] bg-indigo-900">

    <div class="bg-indigo-800 rounded-xl shadow p-10 w-1/3">
        <h1 class="text-indigo-500 text-3xl">AJAX</h1>

        <div class="my-6">
            <select id="province-selector"
                class="py-1 w-full bg-indigo-600 rounded border border-indigo-900 text-white">
                <option value="Northern">Northern province</option>
                <option value="Southern">Southern province</option>
                <option value="Western">Western province</option>
                <option value="Eastern">Estern province</option>
                <option value="Kigali">Kigali city</option>
            </select>

            <div id="output" class="block"></div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        const elementSelector = $("#province-selector")
        const outputElemnt = $("#output")
        elementSelector.change((e) => {
            const url = `http://localhost:8000/api/region/${e.target.value}`
            // fetch data
            fetch(url)
                .then(res => res.json())
                .then(data => displayData(data))
                .catch(error => console.error(error))
        })

        function displayData(data) {
            const ulElement = $('<ul>')
            data.forEach(region => {
                const liElenement = $("<li>")
                liElenement.text(region.district)
                ulElement.append(liElenement)
            })
            outputElemnt.html(ulElement)
        }

    </script>

</body>

</html>