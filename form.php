<?php
class Form
{
  var $fields = array();
  var $fieldsPassword = array();
  var $fieldRadio = array();
  var $fieldCheckBox = array();
  var $fieldDropDown = array();
  var $fieldTextArea = array();

  var $action;
  var $submit = "";
  var $jumField = 0;
  var $jumFieldPassword = 0;
  var $jumFieldRadio = 0;
  var $jumFieldCheckBox = 0;
  var $jumFieldDropDown = 0;
  var $jumfieldTextArea = 0;

  function __construct($action = '', $submit = 'Input')
  {
    $this->action = $action;
    $this->submit = $submit;
  }

  function displayForm()
  {
    $txt= "<form action='' method='post'>";
    $txt.="<table widht='100%'>";


    for ($i = 0; $i < $this->jumField; $i++) {
      $txt.="<tr> 
      <td align='right'>" . $this->fields[$i]['label'] . "</td>";
      $txt.="<td><input type='text' name='" . $this->fields[$i]['name'] . "'></td> 
         </tr>";
    }

    for ($i = 0; $i < $this->jumFieldPassword; $i++) {
      $txt.= "<tr> 
      <td align='right'>" . $this->fieldsPassword[$i]['label'] . "</td>";
      $txt.= "<td><input type='password' name='" . $this->fieldsPassword[$i]['name'] . "'></td> 
         </tr>";
    }

    for ($i = 0; $i < $this->jumFieldRadio; $i++) {
      $txt.= "<tr>
        <td align='right'>" . $this->fieldRadio[$i]['label'] . "</td>";
        $txt.="<td><input type='radio' name='" . $this->fieldRadio[$i]['name'] . "' value='Laki-Laki'/>Laki-Laki</td>";
        $txt.="<td><input type='radio' name='" .  $this->fieldRadio[$i]['name'] . "' value='Perempuan'/>Perempuan</td>
        </tr>";
    }

    for ($i = 0; $i < $this->jumFieldCheckBox; $i++) {
      $txt.="<tr>
        <td align='right'>" . $this->fieldCheckBox[$i]['label'] . "</td>";

        $txt.="<td><input type='hidden' name='" . $this->fieldCheckBox[$i]['name']  . "' value='Tidak Mahasiswa Aktif UNS'></td>";
        $txt.= "<td><input type='checkbox' name='" . $this->fieldCheckBox[$i]['name'] . "' value='Mahasiswa UNS'>Mahasiswa UNS</td> </tr>";
    }


    for ($i = 0; $i < $this->jumFieldDropDown; $i++) {
      $txt.= "<form action='" . $this->action . "' method='post'>";
      $txt.= "<tr>
                <td align='right'>" . $this->fieldDropDown[$i]['label'] .  "</td>";
                $txt.="<td><select name='" . $this->fieldDropDown[$i]['name'] . "'>
                        <option value=''>--- Kota Tinggal ---</option>
                        <option value='Sragen'>Sragen</option>
                        <option value='Surakarta'>Surakarta</option>
                        <option value='Jakarta'>Jakarta</option>
                </select></td>
                </tr>";
    }

    for ($i = 0; $i < $this->jumfieldTextArea; $i++) {
      $txt.= "<tr>
      <td align='right'>" . $this->fieldTextArea[$i]['label'] . "</td>";
      $txt.="<td><textarea name='" . $this->fieldTextArea[$i]['name'] . "' cols='30' rows='4'></textarea></td>
  </tr>";
    }

    $txt.= "<tr><td><input type='submit' name='tombol'  
    value='" . $this->submit . "' ></td></tr>";
    $txt.="</table>";

    return $txt;
  }


  function addField($name, $label)
  {
    $this->fields[$this->jumField]['name'] = $name;
    $this->fields[$this->jumField]['label'] = $label;
    $this->jumField++;
  }
  function addFieldPassword($name, $label)
  {
    $this->fieldsPassword[$this->jumFieldPassword]['name'] = $name;
    $this->fieldsPassword[$this->jumFieldPassword]['label'] = $label;
    $this->jumFieldPassword++;
  }
  function addFieldRadio($name, $label)
  {
    $this->fieldRadio[$this->jumFieldRadio]['name'] = $name;
    $this->fieldRadio[$this->jumFieldRadio]['label'] = $label;
    $this->jumFieldRadio++;
  }
  function addfieldCheckBox($name, $label)
  {
    $this->fieldCheckBox[$this->jumFieldCheckBox]['name'] = $name;
    $this->fieldCheckBox[$this->jumFieldCheckBox]['label'] = $label;
    $this->jumFieldCheckBox++;
  }
  function addfieldDropDown($name, $label)
  {
    $this->fieldDropDown[$this->jumFieldDropDown]['name'] = $name;
    $this->fieldDropDown[$this->jumFieldDropDown]['label'] = $label;
    $this->jumFieldDropDown++;
  }
  function addfieldTextArea($name, $label)
  {
    $this->fieldTextArea[$this->jumfieldTextArea]['name'] = $name;
    $this->fieldTextArea[$this->jumfieldTextArea]['label'] = $label;
    $this->jumfieldTextArea++;
  }


  function getData()
  {

    for ($i = 0; $i < $this->jumField; $i++) {
      $data[$i] = $_POST[$this->fields[$i]['name']];
    }
    return $data;
  }

  function getText()
  {
    for ($i = 0; $i < $this->jumFieldText; $i++) {
      $data[$i] = $_POST[$this->fieldsText[$i]['name']];
    }
    return $data;
  }
  function getPassword()
  {
    for ($i = 0; $i < $this->jumFieldPassword; $i++) {
      $data[$i] = $_POST[$this->fieldsPassword[$i]['name']];
    }
    return $data;
  }
  function getRadio()
  {
    for ($i = 0; $i < $this->jumFieldRadio; $i++) {
      $data[$i] = $_POST[$this->fieldRadio[$i]['name']];
    }
    return $data;
  }

  function getCheckBox()
  {
    for ($i = 0; $i < $this->jumFieldCheckBox; $i++) {
      $data[$i] = $_POST[$this->fieldCheckBox[$i]['name']];
    }
    return $data;
  }

  function getDropDown()
  {
    for ($i = 0; $i < $this->jumFieldDropDown; $i++) {
      $data[$i] = $_POST[$this->fieldDropDown[$i]['name']];
    }
    return $data;
  }
  function getTextArea()
  {
    for ($i = 0; $i < $this->jumfieldTextArea; $i++) {
      $data[$i] = $_POST[$this->fieldTextArea[$i]['name']];
    }
    return $data;
  }
}
