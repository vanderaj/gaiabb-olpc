<?php
/**
 * GaiaBB
 * Copyright (c) 2009-2020 The GaiaBB Project
 * https://github.com/vanderaj/gaiabb
 *
 * Forked from UltimaBB
 * Copyright (c) 2004 - 2007 The UltimaBB Group
 * (defunct)
 *
 * Forked from XMB
 * Copyright (c) 2001 - 2004 The XMB Development Team
 * https://forums.xmbforum2.com/
 *
 * This file is part of GaiaBB
 *
 *    GaiaBB is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    GaiaBB is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with GaiaBB.  If not, see <http://www.gnu.org/licenses/>.
 *
 **/
// phpcs:disable PSR1.Files.SideEffects

namespace GaiaBB;

class FormHelper
{

    public function __construct()
    {
    }

    public static function formSelectOnOff($setname, $varname, $check1, $check2)
    {
        global $THEME, $CONFIG, $lang;
        ?>
        <tr class="tablerow">
            <td bgcolor="<?php echo $THEME['altbg1'] ?>" width="50%"><?php echo $setname ?></td>
            <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%"><select
                        name="<?php echo $varname ?>">
                    <option value="on" <?php echo $check1 ?>><?php echo $lang['texton'] ?></option>
                    <option value="off" <?php echo $check2 ?>><?php echo $lang['textoff'] ?></option>
                </select></td>
        </tr>
        <?php
    }

    public static function formTextBox($setname, $setvarname, $setvalue, $setcols)
    {
        global $THEME, $CONFIG, $lang;
        ?>
        <tr class="tablerow">
            <td bgcolor="<?php echo $THEME['altbg1'] ?>" valign="top" width="50%"><?php echo $setname ?></td>
            <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%">
                <textarea name="<?php echo $setvarname ?>"
                          cols="<?php echo $setcols ?>"><?php echo $setvalue ?></textarea>
            </td>
        </tr>
        <?php
    }

    public static function formTextBox2($setname, $setrows, $setvarname, $setcols, $setvalue)
    {
        global $THEME, $CONFIG, $lang;
        ?>
        <tr class="tablerow">
            <td bgcolor="<?php echo $THEME['altbg1'] ?>" valign="top" width="50%"><?php echo $setname ?></td>
            <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%"><textarea
                        rows="<?php echo $setrows ?>" name="<?php echo $setvarname ?>"
                        cols="<?php echo $setcols ?>"><?php echo $setvalue ?></textarea></td>
        </tr>
        <?php
    }

    public static function formTextPassBox($setname, $varname, $value, $size, $pass = false)
    {
        global $THEME, $CONFIG, $lang;
        ?>
        <tr class="tablerow">
            <td bgcolor="<?php echo $THEME['altbg1'] ?>" width="50%"><?php echo $setname ?></td>
            <?php
            if ($pass) {
                ?>
                <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%"><input
                            type="password" AUTOCOMPLETE="off" size="<?php echo $size ?>"
                            value="<?php echo $value ?>" name="<?php echo $varname ?>"/></td>
                <?php
            } else {
                ?>
                <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%"><input
                            type="text" size="<?php echo $size ?>" value="<?php echo $value ?>"
                            name="<?php echo $varname ?>"/></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }

    public static function formSelectList($setname, $boxname, $varnames, $values, $checked, $multi = true)
    {
        global $THEME, $CONFIG, $lang;

        foreach ($varnames as $key => $val) {
            if (isset($checked[$key]) && $checked[$key] !== true) {
                $optionlist[] = '<option value="' . $values[$key] .
                '">' . $varnames[$key] . '</option>';
            } else {
                $optionlist[] = '<option value="' . $values[$key] .
                    '" selected="selected">' . $varnames[$key] . '</option>';
            }
        }
        $optionlist = implode("\n", $optionlist);
        ?>
        <tr class="tablerow">
            <td bgcolor="<?php echo $THEME['altbg1'] ?>" width="50%" valign="top"><?php echo $setname ?></td>
            <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%">
            <select
                <?php echo ($multi ? 'multiple="multiple"' : '') ?>
                    name="<?php echo $boxname ?><?php echo ($multi ? '[]' : '') ?>"><?php echo $optionlist ?>
            </select>
            </td>
        </tr>
        <?php
    }

    public static function formSelectYesNo($setname, $varname, $check1, $check2)
    {
        global $THEME, $CONFIG, $lang;
        ?>
        <tr class="tablerow">
            <td bgcolor="<?php echo $THEME['altbg1'] ?>" width="50%"><?php echo $setname ?></td>
            <td bgcolor="<?php echo $THEME['altbg2'] ?>" width="50%"><select
                        name="<?php echo $varname ?>">
                    <option value="yes" <?php echo $check1 ?>><?php echo $lang['textyes'] ?></option>
                    <option value="no" <?php echo $check2 ?>><?php echo $lang['textno'] ?></option>
                </select></td>
        </tr>
        <?php
    }

    public static function formCheckBox($varname, $value, $checked, $setname)
    {
        global $THEME, $CONFIG, $lang;

        ?>
        <input type="checkbox" name="<?php echo $varname ?>"
               value="<?php echo $value ?>" <?php echo $checked ?> /><?php echo $setname ?><br/>
        <?php
    }

    public static function getSettingOnOffHtml($setting, &$on, &$off)
    {
        global $CONFIG, $selHTML;

        $on = $off = '';
        switch ($CONFIG[$setting]) {
            case 'on':
                $on = $selHTML;
                break;
            default:
                $off = $selHTML;
                break;
        }
    }

    public static function getSettingYesNoHtml($setting, &$yes, &$no)
    {
        global $CONFIG, $selHTML;

        $yes = $no = '';
        switch ($CONFIG[$setting]) {
            case 'yes':
                $yes = $selHTML;
                break;
            default:
                $no = $selHTML;
                break;
        }
    }

    public static function getThemeOnOffHtml($setting, &$on, &$off)
    {
        global $db, $selHTML, $themedata;

        $on = $off = '';
        switch ($themedata[$setting]) {
            case 'on':
                $on = $selHTML;
                break;
            default:
                $off = $selHTML;
                break;
        }
    }
}

?>