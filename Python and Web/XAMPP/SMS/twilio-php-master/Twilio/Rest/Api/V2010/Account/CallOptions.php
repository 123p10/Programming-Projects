<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class CallOptions {
    /**
     * @param string $url Url from which to fetch TwiML
     * @param string $applicationSid ApplicationSid that configures from where to
     *                               fetch TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackEvent The call progress events that Twilio will
     *                                    send webhooks on.
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @param string $sendDigits Digits to send
     * @param string $ifMachine Action to take if a machine has answered the call
     * @param integer $timeout Number of seconds to wait for an answer
     * @param boolean $record Whether or not to record the Call
     * @param string $recordingChannels mono or dualSet this parameter to specify
     *                                  the number of channels in the final
     *                                  recording.
     * @param string $recordingStatusCallback A URL that Twilio will send a webhook
     *                                        request to when the recording is
     *                                        available for access.
     * @param string $recordingStatusCallbackMethod The HTTP method Twilio should
     *                                              use when requesting the above
     *                                              URL.
     * @param string $sipAuthUsername The sip_auth_username
     * @param string $sipAuthPassword The sip_auth_password
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     * @param integer $machineDetectionTimeout Number of miliseconds to wait for
     *                                         machine detection
     * @param string $recordingStatusCallbackEvent The recording status changes
     *                                             that Twilio will send webhooks
     *                                             on to the URL specified in
     *                                             RecordingStatusCallback.
     * @param string $trim Set this parameter to control trimming of silence on the
     *                     recording.
     * @param string $callerId The phone number, SIP address or Client identifier
     *                         that made this Call. Phone numbers are in E.164
     *                         format (e.g. +16175551212). SIP addresses are
     *                         formatted as `name@company.com`.
     * @return CreateCallOptions Options builder
     */
    public static function create($url = Values::NONE, $applicationSid = Values::NONE, $method = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackEvent = Values::NONE, $statusCallbackMethod = Values::NONE, $sendDigits = Values::NONE, $ifMachine = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $machineDetection = Values::NONE, $machineDetectionTimeout = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $trim = Values::NONE, $callerId = Values::NONE) {
        return new CreateCallOptions($url, $applicationSid, $method, $fallbackUrl, $fallbackMethod, $statusCallback, $statusCallbackEvent, $statusCallbackMethod, $sendDigits, $ifMachine, $timeout, $record, $recordingChannels, $recordingStatusCallback, $recordingStatusCallbackMethod, $sipAuthUsername, $sipAuthPassword, $machineDetection, $machineDetectionTimeout, $recordingStatusCallbackEvent, $trim, $callerId);
    }

    /**
     * @param string $to Phone number or Client identifier to filter `to` on
     * @param string $from Phone number or Client identifier to filter `from` on
     * @param string $parentCallSid Parent Call Sid to filter on
     * @param string $status Status to filter on
     * @param string $startTimeBefore StartTime to filter on
     * @param string $startTime StartTime to filter on
     * @param string $startTimeAfter StartTime to filter on
     * @param string $endTimeBefore EndTime to filter on
     * @param string $endTime EndTime to filter on
     * @param string $endTimeAfter EndTime to filter on
     * @return ReadCallOptions Options builder
     */
    public static function read($to = Values::NONE, $from = Values::NONE, $parentCallSid = Values::NONE, $status = Values::NONE, $startTimeBefore = Values::NONE, $startTime = Values::NONE, $startTimeAfter = Values::NONE, $endTimeBefore = Values::NONE, $endTime = Values::NONE, $endTimeAfter = Values::NONE) {
        return new ReadCallOptions($to, $from, $parentCallSid, $status, $startTimeBefore, $startTime, $startTimeAfter, $endTimeBefore, $endTime, $endTimeAfter);
    }

    /**
     * @param string $url URL that returns TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $status Status to update the Call with
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @return UpdateCallOptions Options builder
     */
    public static function update($url = Values::NONE, $method = Values::NONE, $status = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        return new UpdateCallOptions($url, $method, $status, $fallbackUrl, $fallbackMethod, $statusCallback, $statusCallbackMethod);
    }
}

class CreateCallOptions extends Options {
    /**
     * @param string $url Url from which to fetch TwiML
     * @param string $applicationSid ApplicationSid that configures from where to
     *                               fetch TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackEvent The call progress events that Twilio will
     *                                    send webhooks on.
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @param string $sendDigits Digits to send
     * @param string $ifMachine Action to take if a machine has answered the call
     * @param integer $timeout Number of seconds to wait for an answer
     * @param boolean $record Whether or not to record the Call
     * @param string $recordingChannels mono or dualSet this parameter to specify
     *                                  the number of channels in the final
     *                                  recording.
     * @param string $recordingStatusCallback A URL that Twilio will send a webhook
     *                                        request to when the recording is
     *                                        available for access.
     * @param string $recordingStatusCallbackMethod The HTTP method Twilio should
     *                                              use when requesting the above
     *                                              URL.
     * @param string $sipAuthUsername The sip_auth_username
     * @param string $sipAuthPassword The sip_auth_password
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     * @param integer $machineDetectionTimeout Number of miliseconds to wait for
     *                                         machine detection
     * @param string $recordingStatusCallbackEvent The recording status changes
     *                                             that Twilio will send webhooks
     *                                             on to the URL specified in
     *                                             RecordingStatusCallback.
     * @param string $trim Set this parameter to control trimming of silence on the
     *                     recording.
     * @param string $callerId The phone number, SIP address or Client identifier
     *                         that made this Call. Phone numbers are in E.164
     *                         format (e.g. +16175551212). SIP addresses are
     *                         formatted as `name@company.com`.
     */
    public function __construct($url = Values::NONE, $applicationSid = Values::NONE, $method = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackEvent = Values::NONE, $statusCallbackMethod = Values::NONE, $sendDigits = Values::NONE, $ifMachine = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $machineDetection = Values::NONE, $machineDetectionTimeout = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $trim = Values::NONE, $callerId = Values::NONE) {
        $this->options['url'] = $url;
        $this->options['applicationSid'] = $applicationSid;
        $this->options['method'] = $method;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['sendDigits'] = $sendDigits;
        $this->options['ifMachine'] = $ifMachine;
        $this->options['timeout'] = $timeout;
        $this->options['record'] = $record;
        $this->options['recordingChannels'] = $recordingChannels;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        $this->options['machineDetection'] = $machineDetection;
        $this->options['machineDetectionTimeout'] = $machineDetectionTimeout;
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        $this->options['trim'] = $trim;
        $this->options['callerId'] = $callerId;
    }

    /**
     * The fully qualified URL that should be consulted when the call connects. Just like when you set a URL on a phone number for handling inbound calls. See the [Url Parameter](https://www.twilio.com/docs/api/voice/making-calls#url-parameter) details in [Making Calls](https://www.twilio.com/docs/voice/make-calls) for more details.
     * 
     * @param string $url Url from which to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setUrl($url) {
        $this->options['url'] = $url;
        return $this;
    }

    /**
     * The 34 character SID of the application Twilio should use to handle this phone call. If this parameter is present, Twilio will ignore all of the voice URLs passed and use the URLs set on the application. See the [ApplicationSid Parameter](https://www.twilio.com/docs/api/voice/making-calls#applicationsid-parameter) section in [Making Calls](https://www.twilio.com/docs/voice/make-calls) for more details.
     * 
     * @param string $applicationSid ApplicationSid that configures from where to
     *                               fetch TwiML
     * @return $this Fluent Builder
     */
    public function setApplicationSid($applicationSid) {
        $this->options['applicationSid'] = $applicationSid;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when making its request to the above `Url` parameter's value. Defaults to `POST`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $method HTTP method to use to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * A URL that Twilio will request if an error occurs requesting or executing the TwiML at `Url`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $fallbackUrl Fallback URL in case of error
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that Twilio should use to request the `FallbackUrl`. Must be either `GET` or `POST`. Defaults to `POST`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * A URL that Twilio will send asynchronous webhook requests to on every call event specified in the `StatusCallbackEvent` parameter. If no event is present, Twilio will send `completed` by default. If an `ApplicationSid` parameter is present, this parameter is ignored. URLs must contain a valid hostname (underscores are not permitted).
     * 
     * @param string $statusCallback Status Callback URL
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The call progress events that Twilio will send webhooks on. Available values are `initiated`, `ringing`, `answered`, and `completed`. If you want to receive multiple events, please provide multiple `StatusCallbackEvent` values as individual parameters in the `POST` request. See the code sample for [monitoring call progress](https://www.twilio.com/docs/api/voice/making-calls#make-a-call-and-monitor-progress-events). If no event is specified, defaults to `completed`. If an `ApplicationSid` is present, this parameter is ignored.
     * 
     * @param string $statusCallbackEvent The call progress events that Twilio will
     *                                    send webhooks on.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when requesting the above URL. Defaults to `POST`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * A string of keys to dial after connecting to the number, maximum of 32 digits. Valid digits in the string include: any digit (`0`-`9`), '`#`', '`*`' and '`w`' (to insert a half second pause). For example, if you connected to a company phone number, and wanted to pause for one second, dial extension 1234 and then the pound key, use `SendDigits=ww1234#`. Remember to URL-encode this string, since the '`#`' character has special meaning in a URL. If both `SendDigits` and `MachineDetection` parameters are provided, then `MachineDetection` will be ignored.
     * 
     * @param string $sendDigits Digits to send
     * @return $this Fluent Builder
     */
    public function setSendDigits($sendDigits) {
        $this->options['sendDigits'] = $sendDigits;
        return $this;
    }

    /**
     * Tell Twilio to try and determine if a machine (like voicemail) or a human has answered the call. Possible value are `Continue` and `Hangup`.
     * 
     * @param string $ifMachine Action to take if a machine has answered the call
     * @return $this Fluent Builder
     */
    public function setIfMachine($ifMachine) {
        $this->options['ifMachine'] = $ifMachine;
        return $this;
    }

    /**
     * The integer number of seconds that Twilio should allow the phone to ring before assuming there is no answer. Default is `60` seconds, the maximum is `600` seconds. For some call flows Twilio will add a 5 second buffer to the timeout value provided, so if you enter a timeout value of 10 seconds, you could see actual timeout closer to 15 seconds. Note, you could set this to a low value, such as `15`, to hangup before reaching an answering machine or voicemail.
     * 
     * @param integer $timeout Number of seconds to wait for an answer
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * Set this parameter to true to record the entirety of a phone call. The RecordingUrl will be sent to the StatusCallback URL. Defaults to false.
     * 
     * @param boolean $record Whether or not to record the Call
     * @return $this Fluent Builder
     */
    public function setRecord($record) {
        $this->options['record'] = $record;
        return $this;
    }

    /**
     * `mono` or `dual`Set this parameter to specify the number of channels in the final recording. Defaults to `mono`. In mono-channel, both legs of the call are mixed down into a single channel within a single recording file. With dual-channel, both legs use separate channels within a single recording file.  For dual-channel, the parent call will always be in the first channel and the child call will always be in the second channel.
     * 
     * @param string $recordingChannels mono or dualSet this parameter to specify
     *                                  the number of channels in the final
     *                                  recording.
     * @return $this Fluent Builder
     */
    public function setRecordingChannels($recordingChannels) {
        $this->options['recordingChannels'] = $recordingChannels;
        return $this;
    }

    /**
     * A URL that Twilio will send a webhook request to when the recording is available for access.
     * 
     * @param string $recordingStatusCallback A URL that Twilio will send a webhook
     *                                        request to when the recording is
     *                                        available for access.
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when requesting the above URL. Defaults to `POST`.
     * 
     * @param string $recordingStatusCallbackMethod The HTTP method Twilio should
     *                                              use when requesting the above
     *                                              URL.
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        return $this;
    }

    /**
     * The sip_auth_username
     * 
     * @param string $sipAuthUsername The sip_auth_username
     * @return $this Fluent Builder
     */
    public function setSipAuthUsername($sipAuthUsername) {
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        return $this;
    }

    /**
     * The sip_auth_password
     * 
     * @param string $sipAuthPassword The sip_auth_password
     * @return $this Fluent Builder
     */
    public function setSipAuthPassword($sipAuthPassword) {
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        return $this;
    }

    /**
     * Detect if a human, answering machine or fax has picked up the call. Use `Enable` if you would like Twilio to return an `AnsweredBy` value as soon as it identifies the called party. If you would like to leave a message on an answering machine specify `DetectMessageEnd`. If both SendDigits and MachineDetection parameters are provided, then MachineDetection will be ignored. [Detailed documentation is here](https://www.twilio.com/docs/api/voice/answering-machine-detection).
     * 
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     * @return $this Fluent Builder
     */
    public function setMachineDetection($machineDetection) {
        $this->options['machineDetection'] = $machineDetection;
        return $this;
    }

    /**
     * The number of seconds that Twilio should attempt to perform answering machine detection before timing out and firing a voice request with `AnsweredBy` of `unknown`. Defaults to 30 seconds.
     * 
     * @param integer $machineDetectionTimeout Number of miliseconds to wait for
     *                                         machine detection
     * @return $this Fluent Builder
     */
    public function setMachineDetectionTimeout($machineDetectionTimeout) {
        $this->options['machineDetectionTimeout'] = $machineDetectionTimeout;
        return $this;
    }

    /**
     * The recording status changes that Twilio will send webhooks on to the URL specified in RecordingStatusCallback.  The available values are `in-progress`, `completed`, `failed`. To specify multiple values separate them with a space.  Defaults are `completed`, `failed`.  If any values are specified, the defaults are no longer applicable.
     * 
     * @param string $recordingStatusCallbackEvent The recording status changes
     *                                             that Twilio will send webhooks
     *                                             on to the URL specified in
     *                                             RecordingStatusCallback.
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent) {
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        return $this;
    }

    /**
     * `trim-silence` or `do-not-trim`Set this parameter to define whether leading and trailing silence is trimmed from the recording.  Defaults to `trim-silence`.
     * 
     * @param string $trim Set this parameter to control trimming of silence on the
     *                     recording.
     * @return $this Fluent Builder
     */
    public function setTrim($trim) {
        $this->options['trim'] = $trim;
        return $this;
    }

    /**
     * The phone number, SIP address or Client identifier that made this Call. Phone numbers are in E.164 format (e.g. +16175551212). SIP addresses are formatted as `name@company.com`.
     * 
     * @param string $callerId The phone number, SIP address or Client identifier
     *                         that made this Call. Phone numbers are in E.164
     *                         format (e.g. +16175551212). SIP addresses are
     *                         formatted as `name@company.com`.
     * @return $this Fluent Builder
     */
    public function setCallerId($callerId) {
        $this->options['callerId'] = $callerId;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.CreateCallOptions ' . implode(' ', $options) . ']';
    }
}

class ReadCallOptions extends Options {
    /**
     * @param string $to Phone number or Client identifier to filter `to` on
     * @param string $from Phone number or Client identifier to filter `from` on
     * @param string $parentCallSid Parent Call Sid to filter on
     * @param string $status Status to filter on
     * @param string $startTimeBefore StartTime to filter on
     * @param string $startTime StartTime to filter on
     * @param string $startTimeAfter StartTime to filter on
     * @param string $endTimeBefore EndTime to filter on
     * @param string $endTime EndTime to filter on
     * @param string $endTimeAfter EndTime to filter on
     */
    public function __construct($to = Values::NONE, $from = Values::NONE, $parentCallSid = Values::NONE, $status = Values::NONE, $startTimeBefore = Values::NONE, $startTime = Values::NONE, $startTimeAfter = Values::NONE, $endTimeBefore = Values::NONE, $endTime = Values::NONE, $endTimeAfter = Values::NONE) {
        $this->options['to'] = $to;
        $this->options['from'] = $from;
        $this->options['parentCallSid'] = $parentCallSid;
        $this->options['status'] = $status;
        $this->options['startTimeBefore'] = $startTimeBefore;
        $this->options['startTime'] = $startTime;
        $this->options['startTimeAfter'] = $startTimeAfter;
        $this->options['endTimeBefore'] = $endTimeBefore;
        $this->options['endTime'] = $endTime;
        $this->options['endTimeAfter'] = $endTimeAfter;
    }

    /**
     * Only show calls to this phone number, SIP address, Client identifier or SIM SID.
     * 
     * @param string $to Phone number or Client identifier to filter `to` on
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Only show calls from this phone number, SIP address, Client identifier or SIM SID.
     * 
     * @param string $from Phone number or Client identifier to filter `from` on
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * Only show calls spawned by the call with this SID.
     * 
     * @param string $parentCallSid Parent Call Sid to filter on
     * @return $this Fluent Builder
     */
    public function setParentCallSid($parentCallSid) {
        $this->options['parentCallSid'] = $parentCallSid;
        return $this;
    }

    /**
     * Only show calls currently in this status. May be `queued`, `ringing`, `in-progress`, `canceled`, `completed`, `failed`, `busy`, or `no-answer`.
     * 
     * @param string $status Status to filter on
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Only show calls that started on this date, given as `YYYY-MM-DD`. Also supports inequalities, such as `StartTime&lt;=YYYY-MM-DD` for calls that started at or before midnight on a date, and `StartTime&gt;=YYYY-MM-DD` for calls that started at or after midnight on a date.
     * 
     * @param string $startTimeBefore StartTime to filter on
     * @return $this Fluent Builder
     */
    public function setStartTimeBefore($startTimeBefore) {
        $this->options['startTimeBefore'] = $startTimeBefore;
        return $this;
    }

    /**
     * Only show calls that started on this date, given as `YYYY-MM-DD`. Also supports inequalities, such as `StartTime&lt;=YYYY-MM-DD` for calls that started at or before midnight on a date, and `StartTime&gt;=YYYY-MM-DD` for calls that started at or after midnight on a date.
     * 
     * @param string $startTime StartTime to filter on
     * @return $this Fluent Builder
     */
    public function setStartTime($startTime) {
        $this->options['startTime'] = $startTime;
        return $this;
    }

    /**
     * Only show calls that started on this date, given as `YYYY-MM-DD`. Also supports inequalities, such as `StartTime&lt;=YYYY-MM-DD` for calls that started at or before midnight on a date, and `StartTime&gt;=YYYY-MM-DD` for calls that started at or after midnight on a date.
     * 
     * @param string $startTimeAfter StartTime to filter on
     * @return $this Fluent Builder
     */
    public function setStartTimeAfter($startTimeAfter) {
        $this->options['startTimeAfter'] = $startTimeAfter;
        return $this;
    }

    /**
     * Only show call that ended on this date
     * 
     * @param string $endTimeBefore EndTime to filter on
     * @return $this Fluent Builder
     */
    public function setEndTimeBefore($endTimeBefore) {
        $this->options['endTimeBefore'] = $endTimeBefore;
        return $this;
    }

    /**
     * Only show call that ended on this date
     * 
     * @param string $endTime EndTime to filter on
     * @return $this Fluent Builder
     */
    public function setEndTime($endTime) {
        $this->options['endTime'] = $endTime;
        return $this;
    }

    /**
     * Only show call that ended on this date
     * 
     * @param string $endTimeAfter EndTime to filter on
     * @return $this Fluent Builder
     */
    public function setEndTimeAfter($endTimeAfter) {
        $this->options['endTimeAfter'] = $endTimeAfter;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadCallOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateCallOptions extends Options {
    /**
     * @param string $url URL that returns TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $status Status to update the Call with
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     */
    public function __construct($url = Values::NONE, $method = Values::NONE, $status = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        $this->options['url'] = $url;
        $this->options['method'] = $method;
        $this->options['status'] = $status;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
    }

    /**
     * The fully qualified URL that should be consulted when the call connects. Just like when you set a URL on a phone number for handling inbound calls. See the [Url Parameter](https://www.twilio.com/docs/api/voice/making-calls#url-parameter) section below for more details.
     * 
     * @param string $url URL that returns TwiML
     * @return $this Fluent Builder
     */
    public function setUrl($url) {
        $this->options['url'] = $url;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when making its request to the above `Url` parameter's value. Defaults to `POST`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $method HTTP method to use to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * Either `canceled` or `completed`. Specifying `canceled` will attempt to hang up calls that are queued or ringing but not affect calls already in progress. Specifying `completed` will attempt to hang up a call even if it's already in progress.
     * 
     * @param string $status Status to update the Call with
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * A URL that Twilio will request if an error occurs requesting or executing the TwiML at `Url`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $fallbackUrl Fallback URL in case of error
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that Twilio should use to request the `FallbackUrl`. Must be either `GET` or `POST`. Defaults to `POST`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * A URL that Twilio will send asynchronous webhook requests to on every call event specified in the `StatusCallbackEvent` parameter. If no event is present, Twilio will send `completed` by default. If an `ApplicationSid` parameter is present, this parameter is ignored. URLs must contain a valid hostname (underscores are not permitted).
     * 
     * @param string $statusCallback Status Callback URL
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when requesting the above URL. Defaults to `POST`. If an `ApplicationSid` parameter is present, this parameter is ignored.
     * 
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateCallOptions ' . implode(' ', $options) . ']';
    }
}