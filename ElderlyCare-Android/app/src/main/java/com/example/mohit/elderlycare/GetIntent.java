package com.example.mohit.elderlycare;

import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;

/**
 * Created by Mohit on 8/16/2014.
 */
public class GetIntent extends MyActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.getintent);

        String get = getIntent().getStringExtra("Notif");

        Log.e("Msg", "---------------------------"+get);

        TextView txt = (TextView)findViewById(R.id.get);
        txt.setText(get);

    }
}
