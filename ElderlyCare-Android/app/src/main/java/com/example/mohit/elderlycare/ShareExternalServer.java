package com.example.mohit.elderlycare;

/**
 * Created by Mohit on 11/16/2015.
 */
import android.content.Context;
import android.util.Log;

import java.io.IOException;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

/**
 * Created by Mohit on 8/15/2014.
 */
public class  ShareExternalServer {

    public String shareRegIdWithAppServer(final Context context,
                                          final String regId) {

        String result = "";
        Map<String, String> paramsMap = new HashMap<String, String>();
        paramsMap.put("regId", regId);
        try {
            URL serverUrl = null;
            try {
                serverUrl = new URL(Config.APP_SERVER_URL);
            } catch (MalformedURLException e) {
                Log.e("AppUtil", "URL Connection Error: "
                        + Config.APP_SERVER_URL, e);
                result = "Invalid URL: " + Config.APP_SERVER_URL;
            }

            StringBuilder postBody = new StringBuilder();
            Iterator<Map.Entry<String, String>> iterator = paramsMap.entrySet()
                    .iterator();

            while (iterator.hasNext()) {
                Map.Entry<String, String> param = iterator.next();
                postBody.append(param.getKey()).append('=')
                        .append(param.getValue());
                if (iterator.hasNext()) {
                    postBody.append('&');
                }
            }
            String body = postBody.toString();
            byte[] bytes = body.getBytes();
            HttpURLConnection httpCon = null;
            try {
                httpCon = (HttpURLConnection) serverUrl.openConnection();
                httpCon.setDoOutput(true);
                httpCon.setUseCaches(false);
                httpCon.setFixedLengthStreamingMode(bytes.length);
                httpCon.setRequestMethod("POST");
                httpCon.setRequestProperty("Content-Type",
                        "application/x-www-form-urlencoded;charset=UTF-8");
                OutputStream out = httpCon.getOutputStream();
                out.write(bytes);
                out.close();

                int status = httpCon.getResponseCode();
                if (status == 200) {
                    result = "RegId shared with Application Server. RegId: "
                            + regId;
                    Log.e("Send to server", "----------------------------------- Send to server");
                } else {
                    result = "Post Failure." + " Status: " + status;
                }
                Log.e("Send to server", "----------------------------------- "+result);
            } finally {
                if (httpCon != null) {
                    httpCon.disconnect();
                }
            }

        } catch (IOException e) {
            result = "Post Failure. Error in sharing with App Server.";
            Log.e("AppUtil", "Error in sharing with App Server: " + e);
        }
        return result;
    }
}