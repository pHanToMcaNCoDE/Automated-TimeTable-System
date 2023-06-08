<script>
function deleteData(id) {
    if (confirm("You want to delete ?")) {
        window.location.href = "deletecourse.php?course_id=" + id;
    }

}
</script>

<style>
:root {
    --ash: #f9fafc;
    --cr: crimson;
    --cr2: rgb(247, 128, 152);
    --g2: #d1f1bc;
    --g2: #d1f1bc;
    --purple: #e386fc;
    --pur: #824892;
    --g: #66B830;
    --blk: #000000;
    --w: #ffffff;

    /* FOnts */
    --av: 'Avenir';
}

body {
    background-color: #f9fafc;
    /* border: 1px solid #000; */
    width: 100%;
    padding: 5%;
}

.max-width {
    height: 85vh;
    width: 75%;
    display: flex;
    flex-direction: column;
    border-top-left-radius: 10px;
}


.max-width .top .center {
    width: 40%;
    /* background-color: var(--w); */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px;
    border: 1px solid var(--ash2);
    border-radius: 15px;
}

.max-width .top .center input {
    width: 93%;
    border: 1px solid #000;
    outline: none;
    border: none;
    background-color: var(--w);
    font-family: var(--av), sans-serif;
    letter-spacing: 2.5px;
}

.max-width .top .right a {
    text-decoration: none;
    background-color: var(--pur);
    padding: .7em 1em;
    font-size: 18px;
    color: var(--w);
    border-radius: 6px;
    font-family: var(--av), sans-serif;
}

.max-width .bottom {
    max-height: 650px;
    max-width: fit-content;
    overflow-y: scroll;
    width: 65vw;
    margin: 20px 20px 0px 10px;
}

.max-width .bottom table {
    min-width: max-content;
    border-collapse: separate;
    margin: 30px 10px 10px 2%;
    text-align: left;
    width: 100vw;
    height: 50vh;
    font-family: var(--av), sans-serif;
}


.max-width .bottom table tbody tr td {
    border-bottom: 2px solid var(--ash);
    padding: 1.2%;
    text-align: left;
    font-size: 17px;
    font-weight: 400;
    font-family: var(--av), sans-serif;
    padding: 2%;
    text-align: center;
}

.max-width .bottom table tr th {
    position: sticky;
    text-align: center;
    background-color: var(--blk);
    color: var(--w);
    box-shadow: 0px 2px rgba(216, 215, 215, 0.955);
    z-index: 1;
    top: 0px;
    font-size: 18px;
    font-weight: 400;
    font-family: var(--av), sans-serif;
    padding: 1% 3% 1% 1%;
}
</style>
<div class="max-width" style="position: absolute; top: 17%; background-color: var(--w); position: absolute; left: 20%;">
    <div class="top" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
        <div class=" left">
            <h2>Registered Departments</h2>
        </div>
        <div class="center" style="position: relative;">
            <input type="text" name="searchB" id="search" placeholder="e.g; A111">
            <button class="searchBtn" name="searchBl"
                style="outline: none; border: 1px solid var(--pur); cursor: pointer; background-color: var(--pur); padding: 8px 20px; position: absolute; top: 0; bottom: 0; right: 0; border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </div>
        <div class="right"><a class="lecturerBtn" href='admindashboard.php?info=add_course'><svg
                    xmlns=" http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-square">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>Add a department</a></div>
    </div>
    <div class="bottom">
        <table class='table table-striped'>
            <tr>
                <th>Department Id</th>
                <th>Department</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php 
                    include('../config.php');
                    $sql = "SELECT * FROM department";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["department_id"]."</td>";
                        echo "<td>".$row["department_name"]."</td>";
                        
                                echo "<td>
                                    <abbr title='update'>
                                        <a href='admindashboard.php?info=updatecourse&department_id=".$row["department_id"]."'>
                                            <svg width='23' height='23' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'
                                                style='margin-right: 8%; color: var(--g);'>
                                                <path
                                                    d='M11.8536 1.14645C11.6583 0.951184 11.3417 0.951184 11.1465 1.14645L3.71455 8.57836C3.62459 8.66832 3.55263 8.77461 3.50251 8.89155L2.04044 12.303C1.9599 12.491 2.00189 12.709 2.14646 12.8536C2.29103 12.9981 2.50905 13.0401 2.69697 12.9596L6.10847 11.4975C6.2254 11.4474 6.3317 11.3754 6.42166 11.2855L13.8536 3.85355C14.0488 3.65829 14.0488 3.34171 13.8536 3.14645L11.8536 1.14645ZM4.42166 9.28547L11.5 2.20711L12.7929 3.5L5.71455 10.5784L4.21924 11.2192L3.78081 10.7808L4.42166 9.28547Z'
                                                    fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'>
                                                </path>
                                            </svg>
                                        </a>
                                    </abbr>
                                </td>";
                                echo"<td>
                                    <abbr title='delete'>
                                        <a href='javascript:deleteData(".$row["department_id"].")'>
                                            <svg width='23' height='23' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'
                                                style='margin-left: 8%; color: var(--cr);'>
                                                <path
                                                    d='M0.877075 7.49988C0.877075 3.84219 3.84222 0.877045 7.49991 0.877045C11.1576 0.877045 14.1227 3.84219 14.1227 7.49988C14.1227 11.1575 11.1576 14.1227 7.49991 14.1227C3.84222 14.1227 0.877075 11.1575 0.877075 7.49988ZM7.49991 1.82704C4.36689 1.82704 1.82708 4.36686 1.82708 7.49988C1.82708 10.6329 4.36689 13.1727 7.49991 13.1727C10.6329 13.1727 13.1727 10.6329 13.1727 7.49988C13.1727 4.36686 10.6329 1.82704 7.49991 1.82704ZM9.85358 5.14644C10.0488 5.3417 10.0488 5.65829 9.85358 5.85355L8.20713 7.49999L9.85358 9.14644C10.0488 9.3417 10.0488 9.65829 9.85358 9.85355C9.65832 10.0488 9.34173 10.0488 9.14647 9.85355L7.50002 8.2071L5.85358 9.85355C5.65832 10.0488 5.34173 10.0488 5.14647 9.85355C4.95121 9.65829 4.95121 9.3417 5.14647 9.14644L6.79292 7.49999L5.14647 5.85355C4.95121 5.65829 4.95121 5.3417 5.14647 5.14644C5.34173 4.95118 5.65832 4.95118 5.85358 5.14644L7.50002 6.79289L9.14647 5.14644C9.34173 4.95118 9.65832 4.95118 9.85358 5.14644Z'
                                                    fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'>
                                                </path>
                                            </svg>
                                        </a>
                                    </abbr>
                                </td>";
                        echo "</tr>";
                    }
                    } else {
                    echo "0 results";
                    }

                ?>

        </table>
    </div>
</div>