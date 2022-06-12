<html>
    <head>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hunting_runs";

            try
            {
                $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }

            $courts = $conn->query("SELECT * FROM court");
            $games = $conn->query("SELECT * FROM game");
            $skill = $conn->query("SELECT * FROM skill_level");
            $age = $conn->query("SELECT * FROM age_ranges");

            $i=0;
            $dataCourtArray = array();
            while ($row = $courts->fetch())
            {
                $dataCourtArray[] = $row;
                
                $i++;
            }

            $i=0;
            $dataGameArray = array();
            while ($row = $games->fetch())
            {
                $dataGameArray[] = $row;
                $i++;
            }

            $i=0;
            $skillLevelArray = array();
            while ($row = $skill->fetch())
            {
                $skillLevelArray[] = $row;
                $i++;
            }

            $i=0;
            $ageRangeArray = array();
            while ($row = $age->fetch())
            {
                $ageRangeArray[] = $row;
                $i++;
            }
        ?>

        <script>
            dataCourtArray = <?php echo json_encode($dataCourtArray); ?>;
            console.log(dataCourtArray);
            dataGameArray = <?php echo json_encode($dataGameArray); ?>;
            console.log(dataGameArray)
            
            function searchgames() {
                var search1 = document.getElementById("input").value;
                console.log(search1);
                i=0;
                while(i<dataCourtArray.length) {
                    if (search1 == dataCourtArray[i][1]) {
                        var search2 = dataCourtArray[i][0];
                    }
                    i++;
                }
                console.log(search2);
                i=0;
                while (i<dataGameArray.length) {
                    console.log("here");
                    if (search2 == dataGameArray[i][1]) {
                        console.log("here")
                        console.log(dataGameArray[i]);
                        var x1 = document.getElementById("dateOutput");
                        var y1 = document.createTextNode(dataGameArray[i][2]);
                        console.log(dataGameArray[i][2]);
                        x1.appendChild(y1);
                        var x2 = document.getElementById("timeOutput");
                        var y2 = document.createTextNode(dataGameArray[i][3]);
                        console.log(dataGameArray[i][3]);
                        x2.appendChild(y2);
                    }
                    i++;
                }        
            }

        </script>

        <style>
            #dateOutputText {
                position: absolute;
                left: 300px;
            }
            #timeOutputText {
                position: absolute;
                left: 450px;
            }
            #timeOutput {
                position: absolute;
                left: 500px;
            }
            #dateOutput {
                position: absolute;
                left: 350px;
            }
        </style>   
    </head>
    <body>
        
        <input id="input" type="text"></input>
        <button type="button" onclick="searchgames();">Search By Court</button>
        <a id="dateOutputText">Date:</a>
        <a id="dateOutput"></a>
        <a id="timeOutputText">Time:</a>
        <a id="timeOutput"></a>

        <form class="" action="" method="post" autocomplete="off">
            <label for="">Date</label>
            <input type="date" name="date">
            <br>
            <label for="">Time</label>
            <input type="time" name="time">
            <br>
            <label for="">Court</label>
            <select class="" name="court" required>
                <option value="" selected hidden>Select Court</option>
                <option value="1">Hillcrest</option>
                <option value="2">Christie Pitts</option>
                <option value="3">Dufferin Grove</option>
            </select>
            <br>
            <label for="">Age Range</label>
            <select class="" name="age" required>
                <option value="" selected hidden>Select Age Range</option>
                <option value="1">10 and Under</option>
                <option value="2">11-14</option>
                <option value="3">15-18</option>
                <option value="4">19-25</option>
                <option value="5">26-35</option>
                <option value="6">36 and Up</option>
            </select>
            <br>
            <label for="">Skill Level</label>
            <select class="" name="skill" required>
                <option value="" selected hidden>Select Skill Level</option>
                <option value="1">Beginner</option>
                <option value="2">Intermediate</option>
                <option value="3">Advanced</option>
            </select>
            <br>
            <button type="submit" name="submit">Upload</button>
        </form>

        <?php
            if(isset($_POST["submit"])){
                $court = $_POST["court"];
                $age = $_POST["age"];
                $skill = $_POST["skill"];
                $date = $_POST["date"];
                $time = $_POST["time"];
                $master_query = ('INSERT INTO game (court_id, game_date, game_time, age_range, skill_level) VALUES (:court_id, :game_date, :game_time, :age_range, :skill_level)');
                $prepared_statement = $conn->prepare($master_query);
                $prepared_statement->bindParam('court_id', $court);
                $prepared_statement->bindParam('age_range', $age);
                $prepared_statement->bindParam('skill_level', $skill);
                $prepared_statement->bindParam('game_date', $date);
                $prepared_statement->bindParam('game_time', $time);
                $prepared_statement->execute();
            }
        ?>
        

    </body>
</html>

