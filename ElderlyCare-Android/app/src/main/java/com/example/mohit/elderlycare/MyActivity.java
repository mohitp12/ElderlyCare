package com.example.mohit.elderlycare;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.google.android.gms.gcm.GoogleCloudMessaging;

import java.io.IOException;
/**
 * Created by Mohit on 11/16/2015.
 */
public class MyActivity extends Activity {

    Button Reg, btnAppShare;
    String regId="";
    GoogleCloudMessaging gcm;
    public static final String REG_ID = "regId";
    Context context;
    static final String TAG = "Register Activity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my);

        Reg = (Button) findViewById(R.id.register);
        Reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (TextUtils.isEmpty(regId)) {
                    regId = registerGCM();
                    Log.d("RegisterActivity", "GCM RegId: " + regId);
                } else {
                    Toast.makeText(getApplicationContext(),
                            "RegId already available. RegId: " + regId,
                            Toast.LENGTH_LONG).show();
                }
            }
        });

        btnAppShare = (Button) findViewById(R.id.btnAppShare);
        btnAppShare.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                if (TextUtils.isEmpty(regId)) {
                    Toast.makeText(getApplicationContext(), "RegId is empty!",
                            Toast.LENGTH_LONG).show();
                } else {
                    Intent i = new Intent(getApplicationContext(),
                            MainActivity.class);
                    i.putExtra("regId", regId);
                    Log.d("RegisterActivity",
                            "onClick of Share: Before starting main activity.");
                    startActivity(i);
                    finish();
                    Log.d("RegisterActivity", "onClick of Share: After finish.");
                }
            }
        });
    }


    public String registerGCM() {

        gcm = GoogleCloudMessaging.getInstance(this);
        regId = getRegistrationId(context);

        if (TextUtils.isEmpty(regId)) {

            registerInBackground();

            Log.d("RegisterActivity",
                    "registerGCM - successfully registered with GCM server - regId: "
                            + regId);
        } else {
            Toast.makeText(getApplicationContext(),
                    "RegId already available. RegId: " + regId,
                    Toast.LENGTH_LONG).show();
        }
        return regId;
    }

    private String getRegistrationId(Context context) {
        final SharedPreferences prefs = getSharedPreferences(
                MyActivity.class.getSimpleName(), Context.MODE_PRIVATE);
        String registrationId = prefs.getString(REG_ID, "");
        if (registrationId.isEmpty()) {
            Log.i(TAG, "Registration not found.");
            return "";
        }
        return registrationId;
    }

    private void registerInBackground() {
        new AsyncTask<Void, Void, String>() {
            @Override
            protected String doInBackground(Void... params) {
                String msg = "";
                try {
                    if (gcm == null) {
                        gcm = GoogleCloudMessaging.getInstance(context);
                    }
                    regId = gcm.register(Config.GOOGLE_PROJECT_ID);
                    Log.d("RegisterActivity", "registerInBackground - regId: "
                            + regId);
                    msg = "Device registered, registration ID=" + regId;

                } catch (IOException ex) {
                    msg = "Error :" + ex.getMessage();
                    Log.d("RegisterActivity", "Error: " + msg);
                }
                Log.d("RegisterActivity", "AsyncTask completed: " + msg);
                return msg;
            }

            @Override
            protected void onPostExecute(String msg) {
                Toast.makeText(getApplicationContext(),
                        "Registered with GCM Server." + msg, Toast.LENGTH_LONG)
                        .show();
                saveRegisterId(context, regId);
            }
        }.execute(null, null, null);
    }



    private void saveRegisterId(Context context, String regId) {
        final SharedPreferences prefs = getSharedPreferences(
                MyActivity.class.getSimpleName(), Context.MODE_PRIVATE);
        Log.i(TAG, "Saving regId on app version ");
        SharedPreferences.Editor editor = prefs.edit();
        editor.putString(REG_ID, regId);
        editor.commit();
    }
}
