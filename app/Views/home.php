<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calculator Application</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>

        <div class="center">
            <div class="calc">


            <h1 id="query">0</h2>
            <h3 id="result">0</h3>
    
                <div class="calc-btn-row">
                    <button class="btn btn-lg btn-secondary rounded-5 me-1 mb-2" onclick="deleteAll()">AC</button>
                    <button class="btn btn-lg btn-secondary rounded-5 me-1 mb-2" onclick="deleteOne()">DEL</button>
                    <button class="btn btn-lg btn-secondary rounded-5 me-1 mb-2" onclick="addPrecent()">%</button>
                    <button class="btn btn-lg btn-warning rounded-5 mb-2" onclick="addDivided()">/</button>
                </div>
    
                <div class="calc-btn-row">
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(7)">7</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(8)">8</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(9)">9</button>
                    <button class="btn btn-lg btn-warning rounded-5 mb-2" onclick="addTimes()">X</button>
                </div>
    
                <div class="calc-btn-row">
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(4)">4</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(5)">5</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(6)">6</button>
                    <button class="btn btn-lg btn-warning rounded-5 mb-2" onclick="addMinus()">-</button>
                </div>
    
                <div class="calc-btn-row">
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(1)">1</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(2)">2</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(3)">3</button>
                    <button class="btn btn-lg btn-warning rounded-5 mb-2" onclick="addPlus()">+</button>
                </div>
    
                <div class="calc-btn-row">
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber(0)">0</button>
                    <button class="btn btn-lg btn-outline-secondary rounded-5 me-1 mb-2" onclick="addNumber('.')">.</button>
                    <button class="btn btn-lg btn-warning rounded-5 mb-2" onclick="count()">=</button>
                </div>
            </div>
        </div>
        
    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script> 
    let calc = "";
    let reg = /[/x+-]/g;

    function deleteAll(){
        calc = "";
        document.getElementById('query').innerHTML = "0";
        document.getElementById('result').innerHTML = "0";
    }

    function deleteOne(){
        calc = calc.slice(0, -1);
        document.getElementById('query').innerHTML = calc;
    }

    function addNumber(number){
        calc += number+"";
        document.getElementById('query').innerHTML = calc;
    }

    function addDivided(){
        if(!calc.substr(calc.length - 1).match(reg) && calc.length != 0){
            calc+="/";
            document.getElementById('query').innerHTML = calc;
        }
    }

    function addTimes(){
        if(!calc.substr(calc.length - 1).match(reg) && calc.length != 0){
            calc+="x";
            document.getElementById('query').innerHTML = calc;
        }
    }

    function addPlus(){
        if(!calc.substr(calc.length - 1).match(reg) && calc.length != 0){
            calc+="+";
            document.getElementById('query').innerHTML = calc;
        }
    }

    function addMinus(){
        if(!calc.substr(calc.length - 1).match(reg) && calc.length != 0){
            calc+="-";
            document.getElementById('query').innerHTML = calc;
        }
    }

    function count(){
        let res = 0;
        let numberNow = 0;
        let arrNumber = []
        let arrCount = []
        let counterNumber = 0;
        let counterCount = 0;
        console.log("calc length = " + calc.length + "");
        for (let i = 0; i < calc.length; i++) {
            if(calc.charAt(i).match(reg)){
                console.log("Masuk ke if, count = " + calc.charAt(i));
                arrCount[counterCount] = calc.charAt(i);
                counterCount++;
            }else{
                let counter = 0;
                let index = i;
                let numberKeI = "";
                while(index<calc.length){ //untuk mencari angka
                    if(!calc.charAt(index).match(reg)){ //kalau bukan refex, berarti dia angka
                        console.log("Calc ke " + index + " adalah angka " + calc.charAt(index));
                        numberKeI+=calc.charAt(index);
                        index++;
                        counter++;
                    }else{ //kalau dia regex, stop
                        console.log("Calc ke " + index + " adalah count " + calc.charAt(index));
                        arrCount[counterCount] = calc.charAt(index);
                        counterCount++;
                        index = calc.length;
                        
                    }
                }

                i+=counter;
                console.log("Keluar while, number = " + numberKeI);
                arrNumber[counterNumber] = parseFloat(numberKeI);
                counterNumber++;
            }
            // console.log(arrNumber);
            console.log(arrCount);
        }



        for (let i = 0; i <=arrCount.length; i++) {
            if(i==0){
                res = arrNumber[0];
            }else{
                if(arrCount[i-1] == "+"){
                    res += arrNumber[i];
                }
                else if(arrCount[i-1] == "-"){
                    res -= arrNumber[i];
                }
                else if(arrCount[i-1] == "x"){
                    res *= arrNumber[i];
                }
                else if(arrCount[i-1] == "/"){
                    res /= arrNumber[i];
                }
            }
        }

        if(res ==0 ){
            document.getElementById('result').innerHTML = calc;
        }else{
            document.getElementById('result').innerHTML = res;
        }
    }
</script>