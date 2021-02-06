<?php
$conn = mysqli_connect("localhost", "root", "", "comments");
class molarMass {
    public $symbol;
    function __construct($symbol){
        $this->symbol = $symbol;
    }
    private function filterBrackets($counter, $array){

        $NewArray = array();
        $brackets = '';
        $number = 0;
        $newCounter = $counter + 1;
        while ($brackets !== ')'){
            if($array[$newCounter] === ')'){
                $number = intval($array[$newCounter + 1]);
                $brackets = ')';
                continue;
            }
            $newCounter += 1;
        }
        $index = $newCounter - 1;
        $nextCounter = $counter;
        for($nextCounter; $nextCounter <= $index; $nextCounter++){
            if (is_numeric($array[$nextCounter])){
                array_push($NewArray, strval(intval($array[$nextCounter]) * $number));
                continue;  
            }
            array_push($NewArray, $array[$nextCounter]);
        }
        $replacer = implode('', $NewArray);
        $original = substr($this->symbol, $counter - 1, $newCounter);
        $count = 1;
        $this->symbol = str_replace($original, $replacer, $this->symbol, $count);

    }
    public function mainFilterBrackets(){
        $array = str_split($this->symbol);
        $counter = 0;
        foreach($array as $ar){
            if($ar === '('){
                $counter += 1;
                $this->filterBrackets($counter, $array);
                $this->mainFilterBrackets();
            }            
            $counter += 1;
        }
    }

    
    private function getSizeName($symbol){
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://neelpatel05.pythonanywhere.com/element/symbol?symbol='. $symbol,
            CURLOPT_USERAGENT => 'API'
            ]);
        $respone = curl_exec($curl);
        $respone = json_decode($respone);
        return floatval($respone->atomicMass);
    }
    public function filter(){
        $array = str_split($this->symbol);
        $var = 0;
        $index = 0;
        $counter = 0;
        foreach($array as $ar){
            if (count($array) > $index + 1){
                if($ar === '('){
                    $index++;
                    $counter++;
                    continue; 
                }
                if(is_numeric($ar)){
                    //echo $ar . ' 1 ' . $counter . "<br>";
                    $index++;
                    $counter++; 
                    continue;
                } elseif(ctype_upper($array[$index + 1]) || $array[$index + 1] === '(' || $array[$index + 1] === ')'){
                    //echo $ar . ' 2 ' . $counter . "<br>"; 
                    $this->symbol = substr_replace($this->symbol, '1', $counter + 1, $var); 
                    $index++;
                    $counter++;
                    $counter++; 
                } else{
                    //echo $ar . ' 3 ' . $counter . "<br>"; 
                    $index++;
                    $counter++;  
                }
            } else{ 
                if (is_numeric($ar)){
                    continue;
                } else{
                    $this->symbol = substr_replace($this->symbol, '1', $counter + 1, $var);
                }
            }
        }

    }
    private function GetSymbol(){
        $array = str_split($this->symbol);
        $numbers = array();
        foreach ($array as $ar){
 
            if (is_numeric($ar)){
                array_push($numbers, $ar); 
            }
        }
        $final = array();
        $counter = 0; 
        for ($i = 0; $i < count($numbers); $i++){
            $x = array();
            $z = '';
            while ($z != $numbers[$i]){
                $z = $array[$counter];
                array_push($x, $z);
                $counter++; 
            }
            array_push($final, $x); 
        }   
        return $final; 
    }
    public function Main(){
        $this->filter();
        $this->mainFilterBrackets();
        $final = $this->GetSymbol();
        $filterd = array(); 
        foreach($final as $array){
            $symbol = array();
            $counter = 0; 
            $x = '';
            while(!(is_numeric($array[$counter]))){
                $x = substr_replace($x, $array[$counter], $counter);
                $counter++;
            }
            array_push($symbol, $x);
            array_push($symbol, $array[$counter]);
            array_push($filterd, $symbol);
        }
        $MolarMass = 0;
        foreach($filterd as $array){
            $elementSize = $this->getSizeName($array[0]);
            $total = intval($array[1]);
            $MolarMass += $elementSize * $total;
        }
        return $MolarMass; 
    }   

}








class Comments {
    public $conn;
    public $comment;
    function __construct($conn, $comment){
        $this->conn = $conn;
        $this->comment = $comment; 
    }

    public function addComment(){
        $sql = "INSERT INTO comments (comment) VALUES ('$this->comment');";
        mysqli_query($this->conn, $sql);
    }
    public function readComment(){
        $sql = "SELECT * FROM comments";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0){
            ?>
            <div class="comments">
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="comment" style="border-style: solid">
                        <p><?=$row['comment']?></p>
                        <br>
                        <br>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }

}
