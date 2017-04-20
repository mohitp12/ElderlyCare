# ElderlyCare
Mobile Sensor Cloud using AWS

Developed a mobile app for elderly people living alone who needs continuous attention when they fall. 

It uses smart phones' accelerometer readings and when they fall it sends push notification to the helpers using AWS SNS. The sensors data is constantly monitored and scaled by Elastic beanstalk and Elastic Load Balancer.

Managed users via responsive design dashboard and the major computation part by PHP deployed on Elastic beanstalk to make application lightweight and faster with no lag.

- Dashboard let the admin to monitor usage by single user, remove user, upgrade plans of the users.
- On the other side, users can enrol for a plan, add/remove emergency contacts to their profile and also stop the service when not needed.
