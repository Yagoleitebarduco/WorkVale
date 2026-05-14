import React, { useRef } from 'react';
import { WebView } from 'react-native-webview';
import {
    ActivityIndicator,
    View,
    Alert,
    Linking, 
    StyleSheet
} from 'react-native'

export default function Home () {
    const webViewRef = useRef<WebView>(null);
    const URL = 'http://192.168.1.108:8000';

    const openExternalLink = async (url: string) => {
        try {
            const supported = await Linking.canOpenURL(url);
            if (supported) await Linking.openURL(url);
            else Alert.alert('Erro', `Não foi possivel abrir: ${url}`);
        } catch (error) {
            Alert.alert('Erro', 'Falha ao abrir o link');
        }
    };

    return (
        <View>
            <WebView
                ref={webViewRef}
                source={{ uri: URL }}
                startInLoadingState={true}
                renderLoading={() => (
                    <View style={Styles.loadingConatainer}>
                        <ActivityIndicator size="large" color="#5A1D80" />
                    </View>
                )}
                onShouldStartLoadWithRequest={({ url }) => {
                    if (!url.startsWith(URL)) {
                        openExternalLink(url)
                        return false;
                    }
                    return true
                }}
                javaScriptEnabled={true}
                domStorageEnabled={true}
            />
        </View>
    );
};

const Styles = StyleSheet.create({
  container: { flex: 1 },

  loadingConatainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
});