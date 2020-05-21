<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($this->request->getTitle()); ?></title>
    <style>
        table {
            width: 100%;
            border: 1px solid #444444;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #444444;
            padding: 10px;
        }
        .tag {
            width:30%;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="2">로그인정보</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tag">idx :</td>
                <td><?php echo($this->result->get('member')['idx']); ?></td>
            </tr>
            <tr>
                <td class="tag">id :</td>
                <td><?php echo($this->result->get('member')['id']); ?></td>
            </tr>
            <tr>
                <td class="tag">pw :</td>
                <td><?php echo($this->result->get('member')['pw']); ?></td>
            </tr>
            <tr>
                <td class="tag">email :</td>
                <td><?php echo($this->result->get('member')['email']); ?></td>
            </tr>
            <tr>
                <td class="tag">name :</td>
                <td><?php echo($this->result->get('member')['name']); ?></td>
            </tr>
            <tr>
                <td class="tag">nickname :</td>
                <td><?php echo($this->result->get('member')['nickname']); ?></td>
            </tr>
            <tr>
                <td class="tag">birth :</td>
                <td><?php echo($this->result->get('member')['birth']); ?></td>
            </tr>
            <tr>
                <td class="tag">gender :</td>
                <td><?php echo($this->result->get('member')['gender']); ?></td>
            </tr>
            <tr>
                <td class="tag">favorite :</td>
                <td><?php echo($this->result->get('member')['favorite']); ?></td>
            </tr>
            <tr>
                <td class="tag">mobile_phone :</td>
                <td><?php echo($this->result->get('member')['mobile_phone']); ?></td>
            </tr>
            <tr>
                <td class="tag">profile_img :</td>
                <td><?php echo($this->result->get('member')['profile_img']); ?></td>
            </tr>
            <tr>
                <td class="tag">event_agree :</td>
                <td><?php echo($this->result->get('member')['event_agree']); ?></td>
            </tr>
            <tr>
                <td class="tag">location_agree :</td>
                <td><?php echo($this->result->get('member')['location_agree']); ?></td>
            </tr>
            <tr>
                <td class="tag">update_date :</td>
                <td><?php echo($this->result->get('member')['update_date']); ?></td>
            </tr>
            <tr>
                <td class="tag">create_date :</td>
                <td><?php echo($this->result->get('member')['create_date']); ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <form action="./index.php">
                        <input type="hidden" name="action" value="main">
                        <input type="submit" value="next">
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
    
</body>

</html>