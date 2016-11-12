<div id="content_inner">
  
          <form action="reg.php" method="POST" name="main" enctype="multipart/form-data" onsubmit="">
    <table bgcolor="#dddddd">
    <tr>
      <th colspan="2" align="center">Регистрация нового пользователя</th>
    </tr>    
    <tr>
      <td colspan="2" align="center">Обязательные поля выделены красным цветом<br>
      <?php 
        include_once("regform.php");
        //include_once("");
        //require и require_once()
      ?>
      <br></td>
    </tr>  
    <tr>
      <td align="right"><font color="red">Ник (псевдоним):</td> 
      <td align="left"><input type="text" name="nik" size="27"></td>
    </tr>
    <tr>
      <td align="right"><font color="red">E-mail</td> 
      <td align="left"><input type="text" name="e_mail" size="27"></td>
    </tr>
    <tr>
      <td align="right"><font color="red">Пароль (не менее 6 сим.):</td> 
      <td align="left"><input type="password" name="password" size="27"></td>
    </tr>
    <tr>
      <td align="right"><font color="red">Подтвердите пароль:</td> 
      <td align="left"><input type="password" name="f_password" size="27"></td>
    </tr>
    <tr>
      <td colspan="2"><hr></td>
    </tr>
    <tr>
      <td align="right">Фамилия</td> 
      <td align="left"><input type="text" name="name_f" size="27"></td>
    </tr>
    <tr>
      <td align="right">Имя</td> 
      <td align="left"><input type="text" name="name_i" size="27"></td>
    </tr>
    <tr>
      <td align="right">Отчество</td> 
      <td align="left"><input type="text" name="name_o" size="27"></td>
    </tr>
    <tr>
      <td align="right">Дата рождения:</td> 
      <td align="left">
    <!-- В теге <select> обязательно нужно указать имя и сколько элементов из нашего списка будет 
    видно сразу(с помощью атрибута size)...Каждый элемент пишется после тега <option>,если нужно 
    выбрать 2 и более элементов,то нужно прописать атрибут multiple="multiple"-->
        <select name="day" >
          <option value="1">1
          <option>2
          <option>3
          <option>4
          <option>5
          <option>6
          <option>7
          <option>8
          <option>9
          <option>10
          <option>11
          <option>12
          <option>13
          <option>14
          <option selected>15
          <option>16
          <option>17
          <option>18
          <option>19
          <option>20
          <option>21
          <option>22
          <option>23
          <option>24
          <option>25
          <option>26
          <option>27
          <option>28
          <option>29
          <option>30
          <option>31
        </select>
        <select name="month">
          <option value="01">Январь</option>
          <option value="02">Февраль</option>
          <option value="03">Март</option>
          <option value="04">Апрель</option>
          <option selected value="05">Май</option>
          <option value="06">Июнь</option>
          <option value="07">Июль</option>
          <option value="08">Август</option>
          <option value="09">Сентябрь</option>
          <option value="10">Октябрь</option>
          <option value="11">Ноябрь</option>
          <option value="12">Декабрь</option>
        </select>
        <select name="year">
          <option>1980
          <option>1981
          <option>1982
          <option>1983
          <option>1984
          <option>1985
          <option>1986
          <option>1987
          <option>1988
          <option>1989
          <option>1990
        </select>
      </td>
    </tr>
    <tr>
      <td align="right">Пол:</td> 
      <td align="left">
        <input type="radio" name="sex" value="male">Мужской
        <input type="radio" name="sex" value="female">Женский
      </td>
    </tr>
    <tr>
      <td align="right">Город проживания:</td> 
      <td align="left"><input type="text" name="state" size="27"></td>
    </tr>
    <tr>
      <td align="right" valign="top">Образование:</td> 
      <td align="left">
        <input type="radio" name="edu" value="h" checked>Высшее<br>
    <!-- Слово checked указывает на то,что будет выводиться по умолчанию ...-->
        <input type="radio" name="edu" value="hh">Незаконченное высшее<br>
        <input type="radio" name="edu" value="ss">Среднее специальное<br>
        <input type="radio" name="edu" value="s">Среднее
      </td>
   <!-- <td>
    <textarea name="a_text" rows="5" cols="30">
    </textarea
    -->
    </tr>
    <tr>
      <td colspan="2"><hr></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="Зарегистрироваться">
        <input type="reset" value="Очистить форму">
      </td>
    </tr>
  </table>
</form>  
  <form enctype="multipart/form-data" method="post">
        <input type="file" name="file" multiple accept="image/jpeg,image/png">
  </form>
      </div>
