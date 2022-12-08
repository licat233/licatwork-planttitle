<div id="loading_bg"
    style="width: 100%;height: 100%;position: fixed;top: 0px;left: 0px;z-index: 2000;background-color: rgb(239, 239, 239);opacity: 0.6;display: none;">
</div>
<div id="orderpopup" class="fadeOut"
    style="width: 100%; height: 100%; position: fixed; top: 120px; left: 0px; z-index: 2002; border: 0px solid rgb(255, 0, 0);display:none;">
    <table width="90%" border="0" cellpadding="4" cellspacing="8" align="center"
        style="border:1px solid #666666;border-radius:10px;background-color:#CCCCCC;max-width:500px;">
        <tbody>
            <tr>
                <td style="color:#666666;font-weight:bold;text-align:left;"><span
                        style="color:#FFFFFF;font-size:12px;font-weight:bold;background-color:#468e43;padding:2px 9px 2px 9px;border-radius:20px;">!</span>&nbsp;&nbsp;提示訊息
                </td>
            </tr>
            <tr>
                <td style="background-color:#FFFFFF;padding-top:20px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td style="text-align:center;vertical-align:top;"><span
                                        style="line-height:30px;font-size: 1rem;" id="orderpopup_msg"></span></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;padding:15px 0px;">
                                    <div style="text-align:center;padding:10px;cursor:pointer;" onclick="closeResult()">
                                        <span
                                            style="padding:5px 10px;color:#666666;border:1px solid #CCCCCC;background-color:#EEEEEE;">OK</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>